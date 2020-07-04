@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit - {{ $user->name }}</div>
                <div class="card-body m-1">
                    <form action="{{ route('admin.users.update' ,$user)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}"placeholder="Name">
                            @error('name')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Email">
                            @error('email')
                                <span class="text-danger"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                    @if ($user->hasRole($role->name)) checked @endif>
                                    <label for="">{{$role->name}}</label>
                                </div>
                                
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection