<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminPostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


// example
// Route::get('admin/users', [AdminUsersController::class, 'index']);

// Route::resource('admin/users', 'App\Http\Controllers\AdminUsersController');

Route::get('/admin', function(){
    return view('admin.index');
});


Route::group(['middleware'=> 'admin'], function(){

    //  admin users
    Route::resource('admin/users', AdminUsersController::class);

    //  admins post
    Route::resource('admin/posts', AdminPostsController::class);

});
