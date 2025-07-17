<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [PostsController::class, 'index'])->middleware('auth');

Auth::routes();

Route::get('/email', function (){
  return new NewUserWelcomeMail();
});


Route::post('follow/{user}', [FollowsController::class, 'store']);

Route::post('favorite/{post}', [PostsController::class, 'favoritePost'])->middleware('auth');

Route::get('p/favorites', [PostsController::class, 'myFavorites'])->middleware('auth');
Route::get('/comments', [PostsController::class, 'comments'])->middleware('auth');

Route::get('/p/create', [PostsController::class, 'create'])->middleware('auth');
Route::post('/p', [PostsController::class, 'store'])->middleware('auth');
Route::get('/p/{post}/edit', [PostsController::class, 'edit'])->middleware('auth');
Route::patch('/p/{post}', [PostsController::class, 'update'])->middleware('auth');
Route::get('/p/{post}', [PostsController::class, 'show']);
Route::delete('/p/{post}', [PostsController::class, 'delete']);


Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [FollowsCoProfilesControllerntroller::class, 'update'])->name('profile.update');
