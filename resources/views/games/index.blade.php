@extends('layouts.app')


@section('content')

<div class="container" style="background-color: #333333">
    <p class="text-white">Barre a faire</p>
</div>

<div class="container" style="background-color: #333333;">

    {{-- <nav aria-label="Page navigation example" class="pt-3" >
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
    </nav> --}}


    

    <div class="row justify-content-center ">
        @foreach ($games as $game)
            <div class="col-sm-4 p-4">
                <div class="card rounded-2 shadow" style="width: 18rem;">
                    <img src="{{$game->pathImage}}" class="card-img-top" alt="...">
                    <div class="card-body" style="background-color: #1e1e1e">
                        <h5 class="card-title text-primary fs-5 fw-bold">{{$game->name}}</h5>
                        <div class="row justify-content-center mb-3">
                            <div class="col-9">
                                <p class="card-text fs-5 fw-light fw-bold">{{$game->company}}</p>
                            </div>
                            <div class="col-3">
                                <p class="card-text fs-5 fw-bold">{{$game->price}}€</p>
                            </div>
                        </div>
                        <a href="{{ route('games.show', ['game' => $game]) }}" class="btn btn-primary text-white">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mx-auto pt-3 mb-3" style="width: 200px;">
            {{ $games->links() }}
        </div>
    </div>
</div>

@endsection
