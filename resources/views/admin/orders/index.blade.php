@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($orders as $order)
        
    
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card border border-primary rounded-2 shadow">
                <div class="card-header text-primary fs-4">
                    <span>Achat n°{{ $order->id }}</span>
                    <span style="float: right">Prix de la commande : {{ (floatval($order->amount)) /1000  }}€</span>
                </div>

                <div class="card-body fs-6"> 
                    <table class="table text-white">
                        <thead>
                          <tr>
                            <th scope="col">Référence du jeu</th>
                            <th scope="col">Jeux</th>
                            <th scope="col">Prix unité</th>
                            <th scope="col">Quantité</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach (unserialize($order->products) as $product)
                    <tr>
                        <th scope="row"># {{($product[3])}}</th>
                        <td>{{($product[0])}}</td>
                        <td>{{($product[1])}}</td>
                        <td>{{$product[2]}}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('pdf.show', ['myOrder' => $order])}}">Afficher la facure</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection