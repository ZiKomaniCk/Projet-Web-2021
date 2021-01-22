@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de verification a été envoyé a votre adresse email.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, veuillez verifier votre boite mail pour le lien.') }}
                    {{ __("Si vous n'avez rien reçu") }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici pour renvoyer') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
