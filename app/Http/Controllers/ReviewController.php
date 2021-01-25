<?php

namespace App\Http\Controllers;

use App\Game;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $game = Game::find($request->game);
        // print_r($g);
        return view('reviews.create', ['game' => $game]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->game_id);
        // print_r($request->rate);
        $game = Game::find($request->game_id);
        $newReview = new Review();
        $newReview->game_id = $request->game_id;
        $newReview->user_id = $request->user_id;
        $newReview->rate = $request->rate;
        $newReview->comment = $request->comment;

        $newReview->save();

        return redirect(route('games.show', ['game' => $game]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.show', ['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', ['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $game = Game::find($review->game_id);
        $updateReview = Review::find($review->id);
        $updateReview->rate = $request->rate;
        $updateReview->comment = $request->comment;

        $updateReview->save();

        return redirect(route('games.show', ['game' => $game]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review, Request $request)
    {
        $review->delete();
        return redirect(route('games.show', ['game' => $request->game]));
    }
}
