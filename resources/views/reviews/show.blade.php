@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 mt-5">
            <div class="card border border-primary shadow">
                <div class="card mb-3 " >
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="ml-5 mt-2" src="{{ $review->user->imgPath }}" alt="image de profil" style="width: 160px;">
                            @if (Auth::user()->id == $review->user_id)
                                <div class="row mt-4">
                                    <div class="col-5 ml-3">
                                        <a href="{{ route('reviews.edit', ['review' => $review]) }}" class="btn btn-primary">Modifier</a>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('reviews.destroy', ['review' => $review]) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-2">
                                        <h3 class="card-title fw-bold text-primary">{{ $review->user->nickname }}</h3>
                                    </div>
                                    <div class="col">
                                        <div class="rating">
                                            <div class="rating-upper" style="width: {{ ($review->rate)*20 }}%">
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                            </div>
                                            <div class="rating-lower">
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="card-text">{{ $review->comment }}</p>
                                <p class="card-text"><small class="text-muted fst-italic">Date du commentaire : {{ $review->updated_at }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection