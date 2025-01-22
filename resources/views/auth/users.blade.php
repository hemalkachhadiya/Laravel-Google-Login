@extends('layout.app')
@section('content')
    
        <div class="container">
            <h1>Welcome to the Admin Panel</h1>
            <div class="table-container">
                <h3 class="mb-4">All Users</h3>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Login Provider</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->auth_provider }}</td>
                                <td>
                                    <button class="btn btn-warning">Edit</button> 
                                    &nbsp;
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endsection
