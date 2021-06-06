

{{-- NB:~ after checking everthing works well
we need to create a request for every forms --}}

@extends('layouts.admin')


@section('content')
    <h1>Create post</h1>

    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminPostsController@store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=> 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category_id', [''=> 'Choose categories'] + $categories, null, ['class'=> 'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', ['class'=> 'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('body', 'Description: ') !!}
            {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}
        </div>
    
        <div class='form-group'>
            {!! Form::submit('Create post', ['class'=> 'btn btn-primary']) !!}
        </div>
    
        {!! Form::close() !!}
    </div>

    <div class="row">
        @include('includes.form_errors');
    </div>

@endsection