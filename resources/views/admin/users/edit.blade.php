@extends('layouts.admin')

@section('content')
    <h1>Edit users</h1>  

    <div class="container">
        <div class="row">
            <div class="col-3 col-lg-3 col-sm-3">
                <img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt="" class="img-responsive img-round">
        
            </div>
        
            <div class="col-9 col-lg-9 col-sm-9">
                {!! Form::model($user, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminUsersController@update', $user->id], 'files'=>true]) !!}
        
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $user->name, ['class'=> 'form-control']) !!}
            </div>
        
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', $user->email, ['class'=> 'form-control']) !!}
            </div>
        
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::text('password', null, ['class'=> 'form-control']) !!}
            </div>
        
            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', [''=> 'Choose option']+$roles, $user->role_id, ['class'=> 'form-control']) !!}
            </div>
        
            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active' ), $user->is_active, ['class'=> 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=> 'form-control']) !!}
            </div>
            
        
            <div class='form-group'>
                {!! Form::submit('Update user', ['class'=> 'btn btn-primary']) !!}
            </div>
        
            {!! Form::close() !!}
            </div>
        </div>


        {{-- errors --}}
        <div class="row">
            @include('includes.form_errors');
        </div>

    </div>
    

@endsection