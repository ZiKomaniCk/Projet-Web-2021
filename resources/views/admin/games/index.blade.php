@extends('layouts.app')

@section('content')
<div class="container">

    <div class="float-right mr-3">
        <a class="btn btn-primary text-white" href="{{ route('admin.games.create') }}">Create</a>
    </div>
    
    <div class="mx-auto" style="width: 120px;">
        {{ $games->links() }}
    </div>

    <table class="table text-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Editeur</th>
                <th scope="col">Visible</th>
                <th scope="col">Date de sortie</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <th scope="row ">{{ $game->id }}</th>
                    <td> <img src="{{ $game->pathImage }}" alt="" style="width: 100px"></td>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->price }}€</td>
                    <td>{{ $game->company }}</td>
                    <td>@if ($game->visible == 1)
                            Visible
                        @else
                            Caché
                        @endif 
                    </td>
                    <td>{{ $game->releaseDate }}</td>
                    <td>
                        <a href="{{ route('games.show', ['game' => $game]) }}" type="button" class="btn btn-info text-white">Show</a>
                        <a href="{{ route('admin.games.edit', ['game' => $game]) }}" type="button" class="btn btn-warning ">Edit</a>
                        <form action="{{ route('admin.games.destroy', ['game' => $game]) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mx-auto" style="width: 120px;">
        {{ $games->links() }}
    </div>
</div>
@endsection