@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card mb-3 rounded-2 border-primary">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{$user->imgPath}}" class="profilePicture" style="max-width: 250px;" alt="Votre photo de profil">
      </div>
      <div class="col-md-8">
        <div class="card-body rounded-2">
          <div class="card-body rounded-2">
            <h5 class="card-title fs-1 fw-bold text-primary">{{$user->nickname}}</h5>
            <hr>
            <h5 class="text-end fs-3" style="margin-bottom">crédit: {{$user->credit}}</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4 ">
      
      <div class="card rounded-2 border-primary">
        <div class="card-body">
          <h5 class="card-title fs-4 text-center">Information personnelles</h5>
          <p class="card-text fs-6">Nom : {{$user->lastName}}</p>
          <p class="card-text fs-6">Prénom : {{$user->firstName}}</p>
          <p class="card-text fs-6">Email : {{$user->email}}</p>
          <p class="card-text fs-6">birthDate : {{$user->birthDate}}</p>
          <a class="btn btn-primary text-white" href="{{ route('admin.users.edit', ['user' => Auth::user()]) }}">
            Modifier le profil
          </a>
        </div>
      </div>
    </div>
    
    <div class="col-sm-8 ">
      <div class="row">
        @foreach ($user->games as $game)
          <div class="col-sm-4">
            <div class="card " style="width: 15rem;">
              <img src="{{$game->pathImage}}" class="card-img-top" alt="...">
              <div class="card-body shadow-sm" style="background-color: #1e1e1e">
                  <h5 class="card-title text-primary fs-4 fw-bold">{{$game->name}}</h5>
                  <div class="row justify-content-center mb-3">
                      <div class="col-8">
                          <p class="card-text fs-6 fw-light">{{$game->company}}</p>
                      </div>
                      <div class="col-4">
                          <p class="card-text fs-5 fw-bold">{{$game->price}}€</p>
                      </div>
                  </div>
                  <a href="{{ route('games.show', ['game' => $game]) }}" class="btn btn-primary text-white">Voir plus</a>
                  <a href="{{ route('reviews.create') }}" class="btn btn-primary text-white">Créer review</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      </div>
    </div>
    
  </div>
</div>
@endsection
