<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/posts');
});


//AUTHORS

Route::get('/authors', [AuthorsController::class, 'index']);

Route::post('/authors', [AuthorsController::class, 'store']);

Route::get('/authors/create', [AuthorsController::class, 'create']);

Route::get('/authors/{author}/edit', [AuthorsController::class, 'edit']);

Route::put('/authors/{author}', [AuthorsController::class, 'update']);

Route::delete('/authors/{author}', [AuthorsController::class, 'destroy']);

//MEDIA

Route::get('/media', [MediaController::class, 'index']);

Route::post('/media', [MediaController::class, 'store']);

Route::get('/media/create', [MediaController::class, 'create']);

Route::get('/media/{media}/edit', [MediaController::class, 'edit']);

Route::put('/media/{media}', [MediaController::class, 'update']);

Route::delete('/media/{media}', [MediaController::class, 'destroy']);

//POST

Route::get('/posts', [PostsController::class, 'index']);

Route::post('/posts', [PostsController::class, 'store']);

Route::get('/posts/create', [PostsController::class, 'create']);

Route::get('/posts/{post}/edit', [PostsController::class, 'edit']);

Route::put('/posts/{post}', [PostsController::class, 'update']);

Route::delete('/posts/{post}', [PostsController::class, 'destroy']);
