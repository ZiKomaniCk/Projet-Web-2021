@extends('layouts.app')


@section('content')

<div class="container mb-2" >
    <form class="d-flex" >
        <input class="form-control me-2 bg-gray2e border-primary" name='search' type="search" placeholder="Faire une recherche..."  aria-label="Search">
        <select class="form-select bg-gray2e text-white border-white mr-2" name="platform" style="max-width: 17rem; ">
            <option selected value="null">Selectionner une plateforme</option>
            <option value="XBOX 360">XBOX 360</option>
            <option value="XBOX ONE">XBOX ONE</option>
            <option value="Playsation 1">Playsation 1</option>
            <option value="Playsation 2">Playsation 2</option>
            <option value="Playsation 3">Playsation 3</option>
            <option value="Playsation 4">Playsation 4</option>
            <option value="Nintendo Switch">Nintendo Switch</option>
            <option value="Nintendo Wii">Nintendo Wii</option>
            <option value="PC">PC</option>
        </select>
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
    </form>
</div>


<div class="container" style="background-color: #333333;">   
    @if (session('success'))
        <div class="alert alert-success ">
            {{ session('success') }}
        </div>
    @endif 
    <div class="row justify-content-center ">
        @foreach ($games as $game)
            <div class="col-sm-4 p-4">
                <div class="card rounded-2 shadow" style="width: 18rem;">
                    <img src="{{$game->pathImage}}" class="card-img-top" style="width: 286px; height: 413px;" alt="image du jeu">
                    <div class="card-body" style="background-color: #1e1e1e">
                        <h5 class="card-title text-primary fs-4 fw-bold" style="text-shadow: -1px 1px  #174117;">{{$game->name}}</h5>
                        <div class="row justify-content-center mb-3">
                            <div class="col-9">
                                <p class="card-text fs-5 fw-light fw-bold">{{$game->company}}</p>
                            </div>
                            <div class="col-3">
                                <p class="card-text fs-5 fw-bold">{{$game->price}}€</p>
                            </div>
                        </div>
                        <a href="{{ route('games.show', ['game' => $game]) }}" class="btn btn-primary text-white" style="float:right ;">Plus d'info</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mx-auto pt-3 mb-3" style="width: 200px;">
            {{ $games->links() }}
        </div>
    </div>
</div>

@endsection
