@extends('layouts.app')

@section('content')
<div class="container">
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header fs-4 text-primary">{{ __('Modifier') }}</div>

                <div class="card-body fs-6">
                    <form method="POST" action="{{ route('admin.games.update', ['game' => $game]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.games.partials.form', ['update' => 'yes', 'pegi' => ['3', '7', '12', '16', '18'], 'genres' => $genres])
                        <button type="submit" class="btn btn-primary text-white fs-5 float-right">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection