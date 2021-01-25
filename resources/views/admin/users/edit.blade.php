@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header text-primary fs-3">Modifier utilisateur {{ $user->name }}</div>
                
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('auth.partials.form', ['routeName' => ''])

                        @if (Auth::user()->hasRole('admin'))
                            <div class="form-group row">
                                <label for="roles" class="col-md-4 col-form-label text-md-right">Roles</label>
                                <div class="col-md-6">
                                    @foreach ($roles as $role)
                                    <div>
                                        <input type="checkbox" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->id }}"
                                        @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                        <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="form-group row">
                                <label for="roles" class="col-md-4 col-form-label text-md-right">Roles</label>
                                <div class="col-md-6">
                                    @foreach ($roles as $role)
                                    <div>
                                        <input type="checkbox" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->id }}"
                                        @if ($user->roles->pluck('id')->contains($role->id)) checked @endif onclick="return false;">
                                        <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <img class="mb-4"  src="{{$user->imgPath}}" alt="User image profile" style="width: 18rem; display: block; margin-left: auto; margin-right: auto; ">
                        
                        <div class="form-group row">
                            <label for="imgPath" class="col-md-4 col-form-label text-md-right">{{ __('Profil Image') }}</label>
                            
                            <div class="col-md-6">
                                <input id="imgPath" type="file" class="form-control" name="imgPath"  >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float: right;">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
