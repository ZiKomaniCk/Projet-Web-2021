@extends('layouts.app')


@section('content')

    <div class="container">
        <h1 class="mb-5 text-primary" style="text-align: center">Votre pannier</h1>
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-8 mb-3">
                    <div class="card border border-primary rounded-2 shadow">
                        <div class="card-header text-white fs-5">{{ $product->game->name }}</div>
        
                        <div class="card-body">
                            <p>{{ $product->game->name }}</p>
                            <p>Ajouter au pannier le : {{ $product->created_at }}</p>
                            <p>{{ $product->game->price }} €</p>
                            {{-- <img src="{{ $product->game->pathImage }}"/> --}}
                            <a class="btn btn-primary" href="{{ route('games.show', ['game' => $product->game]) }}">Voir le jeu</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection