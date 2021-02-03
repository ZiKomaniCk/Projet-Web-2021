@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card border-primary">
                <div class="card-header fs-3 text-primary">Liste des utilisateurs</div>
                
                <div class="card-body">
                    <table class="table text-white fs-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Nickname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->firstName . ' ' . $user->lastName }}</td>
                                    <td>{{ $user->nickname }}</td> 
                                    <td>{{ $user->email }}</td> 
                                    <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td> 
                                    <td>
                                        <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="POST" >
                                            <a href="{{ route('admin.users.edit', ['user' => $user]) }}" type="button" class="btn btn-primary">Modifier</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="height: 200px;"></div>
@endsection
