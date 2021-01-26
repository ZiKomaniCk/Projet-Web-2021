@extends('layouts.app')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @if (session('success'))
        <div class="container">
            <div class="alert alert-success ">
                {{ session('success') }}
            </div>
        </div>
    @endif 
    @if (session('danger'))
        <div class="container">
            <div class="alert alert-danger ">
                {{ session('danger') }}
            </div>
        </div>
    @endif 
@if (Cart::count() > 0)

<div class="px-4 px-lg-0">
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-gray2e fs-6 rounded shadow-sm mb-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-gray1e">
                                        <div class="p-2 px-3 text-uppercase text-white">Produit</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-gray1e">
                                        <div class="py-2 text-uppercase text-white">Prix</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-gray1e">
                                        <div class="py-2 text-uppercase text-white">Quantité</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-gray1e">
                                        <div class="py-2 text-uppercase "></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $product)
                                
                                
                                <tr class="text-white">
                                    <th scope="row" class="border-bottom-0 border-primary">
                                        <div class="p-3">
                                            <img src="{{ $product->model->pathImage }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"> <a href="#" class="text-white fs-5 d-inline-block align-middle">{{ $product->model->name }}</a></h5>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-bottom-0 border-primary align-middle"><strong>{{ $product->subtotal() }} €</strong></td>
                                    <td class="border-bottom-0 border-primary align-middle">
                                        <select name="qty" id="qty" data-id="{{ $product->rowId }}" class="custom-select">
                                            @for ($i = 1; $i <= 6; $i++)
                                                <option value='{{ $i }}' {{ $i == $product->qty ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="border-bottom-0 border-primary align-middle">
                                        <form action="{{ route('carts.destroy',  $product->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                            
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row py-5 p-4 bg-gray2e text-white rounded shadow-sm">
                <div class="col-lg-6">
            
            
                </div>
                <div class="col-lg-12">
                    <div class="bg-gray1e rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détails de la commande </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Tout les coûts additionnel seront calculé automatiquement.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between fs-5 py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{ Cart::subtotal() }} €</strong></li>
                            <li class="d-flex justify-content-between fs-5 py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>{{ Cart::tax() }}</strong></li>
                            <li class="d-flex justify-content-between fs-5 py-3 border-bottom"><strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">{{ Cart::total() }}</h5>
                            </li>
                        </ul><a href="{{ route('checkouts.store') }}" class="btn btn-primary rounded-pill py-2 fs-6 btn-block">Passer au paiement</a>
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


@section('extra-js')
    <script>
        let selects = document.querySelectorAll('#qty');
        console.log(selects);
        Array.from(selects).forEach((element) =>{
            element.addEventListener('change', function () {
                let rowId = this.getAttribute('data-id');
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(
                    `/carts/${rowId}`,
                    {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method: 'patch',
                        body: JSON.stringify({
                            qty: this.value,
                        })
                    }
                ).then((data) => {
                    console.log(data);
                    location.reload();
                }).catch((error) => {
                    console.log(error);
                })
            })
        })
    </script>
@endsection