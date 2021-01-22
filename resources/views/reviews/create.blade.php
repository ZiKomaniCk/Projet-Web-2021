@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-primary shadow">
                <div class="card-header text-white fs-5">{{ __('Avis pour ') }} {{$game->name}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reviews.store', ['user_id' => Auth::user()->id, 'game_id' => $game->id]) }}">
                        @csrf
                        @include('reviews.partials.form')
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Creer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
