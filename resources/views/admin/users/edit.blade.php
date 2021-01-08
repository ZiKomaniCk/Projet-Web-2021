@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{ $user->name }}</div>
                
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @foreach ($roles as $role)
                            <div>
                                <input type="checkbox" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->id }}">
                                <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                            
                        @endforeach
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
