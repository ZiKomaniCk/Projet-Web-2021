@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-white">
        <p>nombre de membres : {{ $countUser }}</p>
        <p>nombre de ventes : {{ $countOrder }}</p>
        <p>nombre de nouvelles ventes sur les 7 derniers jours : {{ $countOrderSevenDay }}</p>
        <p>les revenus du site totaux : {{ $countOrderAmount }} €</p>
        <p>les revenus du site sur les 7 derniers jours : {{ $countOrderAmountSevenDays }} €</p>
    </div>
</div>
@endsection