@extends('layouts.app')


@section('content')
@if (session('success'))
<div class="container">
    <div class="alert alert-success ">
        {{ session('success') }}
    </div>
</div>
@endif 
@if (Cart::count() > 0)

<div class="px-4 px-lg-0">
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-dark">
                                        <div class="p-2 px-3 text-uppercase text-white">Produit</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-dark">
                                        <div class="py-2 text-uppercase text-white">Prix</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-dark">
                                        <div class="py-2 text-uppercase text-white">Quantité</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-dark">
                                        <div class="py-2 text-uppercase "></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $product)
                                
                                
                                <tr class="">
                                    <th scope="row" class="border-bottom-0 border-dark">
                                        <div class="p-3">
                                            <img src="{{ $product->model->pathImage }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $product->model->name }}</a></h5>
                                                <span class="text-muted font-weight-normal font-italic d-block">Category: </span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-bottom-0 border-dark align-middle"><strong>{{ $product->model->price }} €</strong></td>
                                    <td class="border-bottom-0 border-dark align-middle"><strong>1</strong></td>
                                    <td class="border-bottom-0 border-dark align-middle">
                                        <form action="{{ route('carts.destroy',  $product->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                            
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                        <div class="input-group mb-4 border rounded-pill p-2">
                            <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                            <div class="input-group-append border-0">
                                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détails de la commande </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{ Cart::subtotal() }} €</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">$400.00</h5>
                            </li>
                        </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @else
    <div class="container text-white py-5 text-center">
        <h4 class="display-5">Votre panier est vide</h4>
        <p class="lead mb-0">Ajouter des jeux a votre panier <a href="{{ route('games.index') }}">liste des jeux</a></p>
      </div>
    @endif
        
@endsection