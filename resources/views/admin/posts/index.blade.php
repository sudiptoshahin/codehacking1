

@extends('layouts.admin')


@section('content')
    <h1>Posts</h1>


    {{-- table starts --}}
    <table class="table table-striped table-dar">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Onwer</th>
            <th scope="col">category id</th>
            <th scope="col">photo id</th>
            <th scope="col">title</th>
            <th scope="col">body</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
          </tr>
        </thead>
        <tbody>

            @if ($posts)
            
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user->name}}</td>
                        <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                        <td><img height="30" width="50" src="{{ $post->photo ? $post->photo->file : '/images/broke-image.png' }}" alt=""></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->created_at->diffForhumans() }}</td>
                        <td>{{ $post->updated_at->diffForhumans() }}</td>
                    </tr>
                @endforeach

            @endif
        </tbody>
      </table>
      
      
    {{-- table ends --}}

@endsection