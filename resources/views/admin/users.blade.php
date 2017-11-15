@extends('layouts.master')

<style>
    .table .center {
        vertical-align: middle;
        text-align: center;
    }
</style>

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
                    <th class="center">ID</th>
                    <th class="center">E-Mail</th>
                    <th class="center">Created</th>
                    <th class="center">Updated</th>
                    <th class="center">Role</th>
                    <th class="center">Edit</th>
                    <th class="center">Delete</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td class="center">{{ $user->id }}</td>
                        <td class="center">{{ $user->email }}</td>
                        <td class="center">{{ $user->created_at }}</td>
                        <td class="center">{{ $user->updated_at }}</td>
                        <td class="center">
                            @if($user->admin_flag == True)
                                <span style="color:red;font-weight:bold">Admin</span>
                            @else
                                User
                            @endif
                        </td>
                        <td class="center"><a href="{{ route('admin.editUser', ['id' => $user->id]) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                        <td class="center"><a href="{{ route('admin.deleteUser', ['id' => $user->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection