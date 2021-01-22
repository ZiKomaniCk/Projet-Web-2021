@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mb-3 rounded-2" >
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $game->pathImage }}" alt="..." style="width: 350px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title fw-bold text-primary" style="text-shadow: -2px 2px  #1e1e1e;"  >{{ $game->name }}</h1>
                    <hr>
                    <p class="card-text fw-bold fs-4">Disponible sur 
                        <span class="text-primary">
                            {{ $game->platform }}
                        </span>
                    </p>
                    <p class="card-text fs-5 fw-bold">Developpé par 
                        <span class="text-primary">
                            {{ $game->company }}
                        </span>
                    </p>
                    <div class="row">
                        <div class="col-md-6 mt-5">
                            <p class="card-text"><small class="text-muted fs-6 fst-italic">Date de sortie : {{ $game->releaseDate }}</small></p>
                        </div>
                        <div class="col-md-6 mt-5">
                            <p class="card-text">

                                    <span class="text-primary fw-bold fs-2">
                                        Score
                                    </span>
                                    <span class="fs-2 fw-bold rounded-circle pb-3 pt-4 pl-1 pr-1"style='background-color: #ff8433'>
                                        {{ $game->score }}/20
                                    </span>

                            </p>
                        </div>
                    </div>
                    
         
                </div>
                <div class="mt-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="ml-5" src="/images/pegi/{{$game->pegi}}.jpg" alt="" style="width: 80px">
                        </div>
                        <div class="col-md-6" >
                            
                            <span class="text-white mt-4 fs-1 fw-bold bg-gray1e pt-2 pb-2 pl-4 pr-4 rounded-pill" style="float: right">
                                {{ $game->price }}€
                                <button class="btn btn-primary text-white fs-3 fw-bold ">Acheter</button>
                            </span>

                            @can('manage-users')
                                <span class="" style="float: right">
                                        <div class="dropdown">
                                        <button class="btn btn-gray1e dropdown-toggle ml-2" type="button" id="optionsDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                            Admin Options
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="optionsDrop">
                                            <li><a class="dropdown-item" href="{{ route('admin.games.edit', ['game' => $game]) }}">Modifier</a></li>
                                            <li>
                                                <form action="{{ route('admin.games.destroy', ['game' => $game]) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" dropdown-item btn btn-danger">Supprimer</button>
                                                </form>
                                                {{-- <a class="dropdown-item" href="{{ route('games.show', ['game' => $game]) }}">Supprimer</a> --}}
                                            </li>
                                        </ul>
                                    </div>
                                </span>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container pl-6 pr-6">
        <div class="card mt-4 rounded-2 ">
            <h2 class="text-primary mb-3 ml-3 mt-3 fw-bold">Description :</h2>
            <div class="container">
                <div class="pl-5 pr-5 overflow-auto mb-5 text-white bg-gray1e rounded" style="max-width: 100%; max-height: 280px;">
                    <p class="">{{ $game->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        
        @foreach ($game->reviews as $review)
        <div class="col-md-6">
            
            <div class="card mt-5 rounded-2 border-primary" >
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $review->user->imgPath }}" alt="image de profil" style="max-width: 160px;">
                        
                        @if ( !empty(Auth::user()->id) && (Auth::user()->id == $review->user_id|| Auth::user()->hasRole('admin')))
                            <div class="row mt-4">
                                <div class="col-5 mr-1 ml-1">
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
                            {{-- <h3 class="card-text">{{ $review->title }}</h3> --}}
                            <p class="card-text">{{ $review->comment }}</p>
                            <p class="card-text"><small class="text-muted fst-italic">Date du commentaire : {{ $review->updated_at }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
    
</div>

@endsection

