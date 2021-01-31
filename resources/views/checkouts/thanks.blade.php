@extends('layouts.app')

@section('content')
<div class="container text-white py-5 text-center">
    <h4 class="display-5">Merci de votre achat !</h4>
    <p class="lead mb-0">Vous allez recevoir votre facture par mail dans peu de temps</p> <hr>
    <a class="lead mt-4 fs-5" href="{{ route('games.index') }}">Page d'accueil</a>
  </div>

<div class="container" style="height: 200px;"></div>
@endsection