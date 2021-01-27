<?php

namespace App\Http\Controllers;

use App\Game;
use App\Mail\Order as MailOrder;
use App\Order;
use App\User;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Cart::count() > 0 && Auth::user())
        {
            Stripe::setApiKey('sk_test_51IDUonGO87gMjJ4fxBhklnBGUEYbnaH4cEOKYYr6RhcOi5r3qGuOvApyVGGsBoj6BzEeP4AuLrQ9SVEcLsj0IcU800iv6x0hez');

            $intent = PaymentIntent::create([
                'amount' => getPriceIntent(Cart::total()),
                'currency' => 'eur',
                // Verify your integration in this guide by including this parameter
                // 'metadata' => ['integration_check' => 'accept_a_payment'],
            ]);
            $clientSecret = Arr::get($intent, 'client_secret');
            return view('checkouts.index', ['clientSecret' => $clientSecret]);
        }else{
            return redirect(route('games.index'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();

        $newAmount = $data['paymentIntent']['amount'] *10;
        $order = new Order();

        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $newAmount;

        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $products = [];

        $i = 0;

        $games = [];

        foreach(Cart::content() as $product){
            $products['game_' . $i][] = $product->model->name;
            $products['game_' . $i][] = $product->model->price;
            $products['game_' . $i][] = $product->qty;
            $products['game_' . $i][] = $product->model->id;

            $game = Game::find($product->model->id);
            if( ($product->qty <= $game->quantity) )
            {
                $game->quantity = $game->quantity - $product->qty;
                if($game->quantity == 0){
                    $game->visible = 0;
                }
                $game->save();
            }else{
                Session::flash('danger', 'Votre commande a été interrompu, il ne reste plus assez de jeux.');
                return( response()->json(['error' => 'Payment Intent Not Succeeded']));
            }
            $games[$i][] = $game->name; 
            $games[$i][] = $game->activationCode; 
            $i++;
        }

        $order->products = serialize($products);
        $order->user_id = Auth::user()->id;
        $order->save();

        if($data['paymentIntent']['status'] == 'succeeded'){
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            
            Mail::to(Auth::user()->email)
                ->send(new MailOrder([
                    'firstName' => Auth::user()->firstName, 
                    'gamePrice' => (floatval($newAmount) / 1000),
                    'emailCompany' => 'contactEkip@ceqonveut.com',
                    'games' => $games,
                    'companyName' => 'Gamingue']));

            return( response()->json(['success' => 'Payment Intent Succeeded']));
        }else{
            return( response()->json(['error' => 'Payment Intent Not Succeeded']));
        }
    }

    public function thanks()
    {
        return Session::has('success') ? view('checkouts.thanks') : redirect(route('games.index'));
    }

    public function storeSolde(Request $request)
    {
        $order = new Order();
        $order->amount = getPriceSolde(Cart::total());
        $order->payment_created_at = date('Y-m-d H:i:s');


        $products = [];
        $games = [];

        $i = 0;

        foreach(Cart::content() as $product){
            $products['game_' . $i][] = $product->model->name;
            $products['game_' . $i][] = $product->model->price;
            $products['game_' . $i][] = $product->qty;
            $products['game_' . $i][] = $product->model->id;

            $game = Game::find($product->model->id);
            if( ($product->qty <= $game->quantity) )
            {
                $game->quantity = $game->quantity - $product->qty;
                if($game->quantity == 0){
                    $game->visible = 0;
                }
                $game->save();
            }else{
                Session::flash('danger', 'Votre commande a été interrompu, il ne reste plus assez de jeux.');
                return( response()->json(['error' => 'Payment Intent Not Succeeded']));
            }
            $games[$i][] = $game->name; 
            $games[$i][] = $game->activationCode; 
            $i++;
        }

        $order->products = serialize($products);
        $order->user_id = Auth::user()->id;
        $order->save();

        $user = User::find(Auth::user()->id);
        $user->credit = $user->credit - doubleval(str_replace(",", ".", Cart::total()));
        $user->save();

        Cart::destroy();
        Session::flash('success', 'Votre commande a été traitée avec succès.');

        Mail::to(Auth::user()->email)
            ->send(new MailOrder([
                'firstName' => Auth::user()->firstName, 
                'gamePrice' => (floatval($order->amount) / 1000),
                'emailCompany' => 'contactEkip@ceqonveut.com',
                'games' => $games,
                'companyName' => 'Gamingue']));

        return redirect(route('checkouts.thanks'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
