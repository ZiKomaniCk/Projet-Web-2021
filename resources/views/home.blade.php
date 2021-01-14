@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          
          {{ __('Vous êtes connecté !') }}
          
        </div>
      </div>      
    </div>
  </div>
</div>

<div class="container">
  <div class="card mb-3" style="max-width: 100%;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{$user->imgPath}}" class="profilePicture" style="max-width: 250px;" alt="Votre photo de profil">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title fs-1 fw-bold">{{$user->nickname}}</h5>
          <br>
          <p class="card-text fs-5">Informations personelles</p>
          <p class="card-text fs-5">Nom : {{$user->lastName}}</p>
          <p class="card-text fs-5">Prénom : {{$user->firstName}}</p>
          <p class="card-text fs-5">Nom : {{$user->lastName}}</p>
          <p class="card-text fs-5">Nom : {{$user->lastName}}</p>


          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
