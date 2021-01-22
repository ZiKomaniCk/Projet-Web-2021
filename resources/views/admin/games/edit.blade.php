@extends('layouts.app')

@section('content')
<div class="container">
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.games.update', ['game' => $game]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.games.partials.form')
                        <button type="submit" class="btn btn-primary text-white">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection