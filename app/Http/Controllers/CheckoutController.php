<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        Cart::destroy();
        $data = $request->json()->all();
        return $data['paymentIntent'];
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
