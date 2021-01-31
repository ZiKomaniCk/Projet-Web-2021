@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card border-primary">
                <div class="card-header text-primary fs-3">Liste des jeux
                    <a class="btn btn-primary text-white fs-5 pl-5 pr-5 float-right" href="{{ route('admin.games.create') }}">Ajouter un jeu</a>
                </div>
                <div class="">

                </div>
                
                <div class="mx-auto" style="width: 120px;">
                    {{ $games->links() }}
                </div>
                
                <table class="table text-white fs-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Editeur</th>
                            <th scope="col">Visible</th>
                            <th scope="col" style="text-align: center">Note moyenne</th>
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
                            <td style="text-align: center">{{ ($game->reviews->avg('rate')) }}</td>
                            <td>{{ $game->releaseDate }}</td>
                            <td>
                                <form action="{{ route('admin.games.destroy', ['game' => $game]) }}" method="POST" >
                                    <a href="{{ route('admin.games.edit', ['game' => $game]) }}" type="button" class="btn btn-primary pt-2 pb-2 ">Modifier</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2 pb-2 ">Supprimer</button>
                                </form>
                                <a href="{{ route('games.show', ['game' => $game]) }}" type="button" class="btn btn-info text-white pl-5 pr-5 pt-2 pb-2 mt-2">Voir plus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="mx-auto" style="width: 120px;">
                    {{ $games->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection