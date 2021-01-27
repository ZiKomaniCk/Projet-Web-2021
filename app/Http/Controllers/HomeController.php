<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $games = array();
        foreach($user->orders as $order){
            foreach(unserialize($order->products) as $product){
                $game = Game::find($product[3]);
                $game->qty = $product[2];
                $games[] = $game;
            }
        }
        return view('home', ['user' => $user, 'games' => $games]);
    }
}
