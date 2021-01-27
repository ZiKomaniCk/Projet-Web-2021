<?php

namespace App\Http\Controllers;

use App\Game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate as FacadesGate;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index(Request $request)
    {
        $games = Game::where('visible', '=', 1)->paginate(6);
        $platform = $request->platform;
        if(!(empty($platform))){
            if(!empty($request->search)){
                $games = Game::where('name', 'like', '%' . $request->search . '%')
                    ->where('visible', '=', 1)
                    ->where('platform', '=', $request->platform)
                    ->paginate(6);
            }else{
                $games = Game::where('visible', '=', 1)
                    ->where('platform', '=', $request->platform)
                    ->paginate(6);
            }
            
        }

        return view('games.index', ['games' => $games]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        
        if($game->visible == 1 ){
            return view('games.show', ['game' => $game]);
        }else{
            if(Auth::user()){
                $user = User::find(Auth::user()->id);
                if( $user->hasRole('admin')){
                    return view('games.show', ['game' => $game]);
                }
            }
            return redirect(route('games.index'));
        }
    }

}
