@extends('layouts.app')

@section('content')

{{-- <div class="container">
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
</div> --}}

<div class="container">
  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{$user->imgPath}}" class="profilePicture" style="max-width: 250px;" alt="Votre photo de profil">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <div class="card-body">
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
      
      <div class="card" >
        <div class="card-body ">
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
      <div class="card" style="">
        <div class="card-body ">
          <h5 class="card-title fs-4 text-center">Information personnelles</h5>
          <p class="card-text fs-6">Nom : {{$user->lastName}}</p>
          <p class="card-text fs-6">Prénom : {{$user->firstName}}</p>
          <p class="card-text fs-6">Email : {{$user->email}}</p>
          <p class="card-text fs-6">Nom : {{$user->lastName}}</p>
        </div>
      <div class="card" style="">
        <div class="card-body ">
          <h5 class="card-title fs-4 text-center">Jeux acheté</h5>
          <p class="card-text fs-6">. . .</p>

        </div>
      </div>
      </div>
    </div>
    
    
  </div>
</div>
@endsection
