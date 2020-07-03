@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User Management</div>
                <div class="card-body m-1">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role(s)</th>
                            <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                    <td><a href="{{route('admin.users.edit', $user)}}" class="btn btn-success">Edit</a></td>
                                    <td>
                                        <form action="{{route('admin.users.destroy', $user)}}" mechtod="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Delete"/>
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
@endsection