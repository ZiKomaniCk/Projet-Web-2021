@extends('layouts.app')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header fs-4 fw-bold text-primary">{{ __('Paiement avec Carte Bleu') }}</div>
                
                <form action="{{ route('checkouts.store') }}" method="POST" id="payment-form" class="m-5">
                    @csrf
                    <span >
                        <div id="card-element" class=" mt-2">
                            <!-- Elements will create input elements here -->
                        </div>
                    </span>
                    <div id="card-errors" role="alert"></div>
                    <!-- We'll put the error messages in this element -->
                    
                    <button class="btn btn-success mt-3 mr-3 fs-5 float-right" id="submit">Procéder au paiement</button>
                </form>
                
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card border-primary">
                <div class="card-header fs-4 fw-bold text-primary">{{ __('Paiement avec votre Solde') }}</div>
                <div class="card-body">
                    <p class="card-text fs-4 ml-3">Prix à payer : {{ Cart::total() }} €</p>
                    <p class="card-text fs-4 ml-3">Votre Solde : {{ Auth::user()->credit }} €</p>
                        
                
                @if (Auth::user()->credit >= Cart::total())
                    </div>
                    <form action="{{ route('checkouts.storeSolde') }}" method="POST"  class="m-5">
                        @csrf
                        <button class="btn btn-success mt-3 mr-3 fs-5 float-right" id="submit">Procéder au paiement</button>
                    </form>
                @else
                    <p class="card-text fs-4 ml-3">Vous n'avez pas les fond necessaire, cliquer <a href="{{ route('admin.users.edit', ['user' => Auth::user()]) }}">ici</a></p>
                    </div>
                @endif
                
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
    var stripe = Stripe('pk_test_51IDUonGO87gMjJ4fJW3WUfiECI3O7SZEWOyWhhEvpkhhNblf4faFIRA4qDFvnl2QnC6KBb0UliIUu1tiqGbelCuC00VJBezsk9');
    var elements = stripe.elements();
    var style = {
        base: {
            color: "#ffffff",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "25px",
            iconColor: "#F7F1F0",
            "::placeholder": {
                color: "#aab7c4"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };
    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.addEventListener('change', ({error}) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-warning', 'mt-3');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning', 'mt-3');
            displayError.textContent = '';
        }
    });
    var submitButton = document.getElementById('submit');
    submitButton.addEventListener('click', function(ev) {
        ev.preventDefault();
        submitButton.disabled = true;
        stripe.confirmCardPayment("{{ $clientSecret }}", {
            payment_method: {
                card: card
            }
        }).then(function(result) {
            if (result.error) {
                submitButton.disabled = false;
                console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    let paymentIntent = result.paymentIntent;
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    let form = document.getElementById('payment-form');
                    let url = form.action;
                    let redirect = '/merci';
                    
                    fetch(
                    url,
                    {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method: 'post',
                        body: JSON.stringify({
                            paymentIntent: paymentIntent,
                        })
                    }).then((data)=>{
                        console.log(data)
                        window.location.href = redirect;
                    }).catch((error) => {
                        console.log(error)
                    })
                }
            }
        });
    });
</script>
@endsection