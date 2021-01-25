@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-primary rounded-2 shadow">
                <div class="card-header text-primary fs-4">{{ __("S'enregister") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @include('auth.partials.form', ['routeName' => 'register'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
