<?php

namespace App\Http\Controllers;

use App\Game;
use App\Order;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\Invoices\Classes\Party;

class InvoiceController extends Controller
{
    public function show(Request $request){

        if($request->myOrder){
            $myOrder = $request->myOrder;
        }else{
            $myOrder = null;
        }

        if($myOrder == null){
            $myOrder = Order::where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->first();
        }else{
            $myOrder = Order::find($myOrder);
        }
        

        $client = new Party([
            'name'          => 'Gamingue',
            'phone'         => '06 07 38 45 33',
            'custom_fields' => [
                'order number' => $myOrder->id,
            ],
        ]);

        // dd($myOrder);
        $customer = new Buyer([
            'name'          => Auth::user()->firstName . ' ' . Auth::user()->lastName,
            'custom_fields' => [
                'Pseudo' => Auth::user()->nickname,
                'Email' => Auth::user()->email,
            ],
        ]);


        // $user = Auth::user();
        $items = array();
        
        foreach(unserialize($myOrder->products) as $product){
            $game = Game::find($product[3]);
            // $game->qty = $product[2];
            $items[] = (new InvoiceItem($product[2]))->title($game->name)->pricePerUnit($game->price);

        }


        $invoice = Invoice::make('Paiement')
            ->buyer($customer)
            ->seller($client)
            ->taxRate(20)
            ->addItems($items);

        return $invoice->stream();
    }
}
