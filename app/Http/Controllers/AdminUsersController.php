<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Photo;
use Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  here we are using pluck() insted of lists() methods
        $roles = Role::pluck('name', 'id')->all();


        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        // storing to databases

        // User::create($request->all());

        
        $user = new User();

        if(trim($request->password) == '') {
            $user->password = $request->except('password');
        } else {
            $user->role_id = $request->role_id;
            $user->is_active = $request->is_active;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

        }

        // $user->role_id = $request->role_id;
        // $user->is_active = $request->is_active;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        
        if($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images/', $name);
            $photo = Photo::create(['file'=>$name]);

            $user->photo_id = $photo->id;
        }
        
        $user->save();

        return redirect('/admin/users');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::pluck('name', 'id')->all();
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=> $name]);

            $input['photo_id'] = $photo->id;

        }

        $user->update($input);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        //  delete users profile picture
        unlink(public_path(). $user->photo->file);
        $user->delete();
        

        session()->flash('deleted_user', 'The user has been deleted');
        
        return redirect('/admin/users');
    }
}
 