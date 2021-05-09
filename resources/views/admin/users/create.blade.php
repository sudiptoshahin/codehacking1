@extends('layouts.admin')

@section('content')
    <h1>Create users</h1> 

    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUsersController@store', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::text('password', null, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', [''=> 'Choose option']+$roles, null, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active' ), 0, ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=> 'form-control']) !!}
    </div>
    

    <div class='form-group'>
        {!! Form::submit('Create user', ['class'=> 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    {{-- errors --}}
    @include('includes.form_errors')
    

@endsection