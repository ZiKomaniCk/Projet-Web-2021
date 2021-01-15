@extends('layouts.app')

@section('content')
<div class="container">
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Création') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @include('admin.games.partials.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection