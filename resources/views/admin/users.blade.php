@extends('layouts.master')
@section('content')
    <h1>User Management</h1><hr>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>E-Mail</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            @if($user->admin_flag == True)
                                <span style="color:red;font-weight:bold">Admin</span>
                            @else
                                User
                            @endif
                        </td>
                        <td><a href="{{ route('admin.editUser', ['id' => $user->id]) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                        <td>
                            {!! Form::open(['route' => 'admin.deleteUser']) !!}
                            {!! Form::hidden('id', $user->id) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection