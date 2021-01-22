<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::paginate(10);
        return view('admin.games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faker $faker)
    {
        $newGame = new Game();
        $newGame->name = $request->name;
        $newGame->price = $request->price;
        $newGame->score = $request->score;
        $newGame->description = $request->description;
        $newGame->visible = $request->visible;
        $newGame->activationCode = $faker->swiftBicNumber;
        $newGame->releaseDate = $request->releaseDate;
        $newGame->company = $request->company;
        $newGame->pegi = $request->pegi;
        $newGame->platform = $request->platform;

        $file = $request->file('pathImage');
        $newGame->pathImage = '/images/games/' . $file->getClientOriginalName();
        $file->move(public_path('\images\games/'), $file->getClientOriginalName());

        $newGame->save();

        return redirect(route('games.show', ['game' => $newGame]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        // dd($game);
        

        // $updateGame = new Game();
        // $updateGame->name = $request->name;
        // $updateGame->price = $request->price;
        // $updateGame->score = $request->score;
        // $updateGame->description = $request->description;
        // $updateGame->visible = $request->visible;
        // $updateGame->activationCode = $faker->swiftBicNumber;
        // $updateGame->releaseDate = $request->releaseDate;
        // $updateGame->company = $request->company;
        // $updateGame->pegi = $request->pegi;
        // $updateGame->platform = $request->platform;

        if ($request->hasFile('pathImage')){
            print_r('file');
        }else{
            print_r('marche po');
        }

        // $file = $request->file('pathImage');
        // $updateGame->pathImage = '/images/games/' . $file->getClientOriginalName();
        // $file->move(public_path('\images\games/'), $file->getClientOriginalName());

        // $updateGame->save();

        // return redirect(route('games.show', ['game' => $newGame]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //delete reviews and users
    }
}
