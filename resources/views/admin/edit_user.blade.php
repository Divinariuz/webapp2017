@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            {!! Form::open(['route' => ['admin.updateUser', $user->id]]) !!}
            <div class="form-group">
                {!! Form::label('email', 'E-Mail:') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('admin_flag', 'Role:') !!}
                {!! Form::select('admin_flag', ['1' => 'Admin', '0' => 'User'], $user->admin_flag) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection