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
                    <form method="POST" action="{{ route('admin.games.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.games.partials.form', ['update' => 'no'])
                        <button type="submit" class="btn btn-primary text-white">Creer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection