@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{ $user->name }}</div>
                
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('auth.partials.form', ['routeName' => ''])

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

                        <div class="form-group row">
                            <label for="imgPath" class="col-md-4 col-form-label text-md-right">{{ __('Profil Image') }}</label>
                            
                            <div class="col-md-6">
                                <input id="imgPath" type="file" class="form-control" name="imgPath"  >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
