@extends('layouts.admin')

@section('content')


  @if (session()->has('deleted_user'))
    <h3 class="bg-danger"> {{ session('deleted_user') }} </h3>
  @endif

  <h1>Users</h1>

    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
          </tr>
        </thead>
        <tbody>
          
          @if ($users)

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td><img height="35" width="50" src="{{ $user->photo ? $user->photo->file : '/images/broke-image.png' }}" alt="" srcset=""></td>

                    <td><a href="{{ url('admin/users/'.$user->id.'/edit') }}"> {{ $user->name }} </a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->is_active == 1 ? 'Active' : 'Not active'}}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                </tr> 
            @endforeach
              
          @endif

        </tbody>
      </table>



@endsection