@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-primary rounded-2 mt-5 shadow">
                <div class="card-header text-primary fs-3">Tableau de bord</div>
                
                <div class="card-body">

                    <div class="text-white fs-5">
                        <p>Nombre de membres : <span class="fs-3 text-primary"> {{ $countUser }}</span></p>
                        <p>Nombre de ventes : <span class="fs-3 text-primary">{{ $countOrder }}</span></p>
                        <p>Nombre de nouvelles ventes sur les 7 derniers jours : <span class="fs-3 text-primary">{{ $countOrderSevenDay }}</span></p>
                        <p>Revenus du site sur les 7 derniers jours : <span class="fs-3 text-primary">{{ $countOrderAmountSevenDays }}€</span></p>
                        <p class="fs-3 mt-4">Revenus totaux du site : <span class="fs-2 text-primary">{{ $countOrderAmount }}€</span></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container" style="height: 200px;"></div>
@endsection