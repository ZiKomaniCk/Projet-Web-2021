@extends('layouts.app')


@section('content')

<div class="container" style="background-color: white">
    <p>la barre de recherche</p>
</div>

<div class="container" style="background-color: whitesmoke">
    
    <div class="row justify-content-center ">
        @foreach ($games as $game)
            <div class="col-sm-4 p-3">
                <div class="card " style="width: 18rem;">
                    <img src="{{$game->pathImage}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$game->name}}</h5>
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        {{-- <p class="card-text">{{$game->description}}</p> --}}
                        <div class="row justify-content-center mb-3">
                            <div class="col-9">
                                <p class="card-text">{{$game->company}}</p>
                            </div>
                            <div class="col-3">
                                <p class="card-text">{{$game->price}} €</p>
                            </div>
                        </div>
                        <a href="{{ route('games.show', ['game' => $game]) }}" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
