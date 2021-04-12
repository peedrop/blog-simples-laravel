<?php

use App\Http\Controllers\CategoryBlogController;
use App\Http\Controllers\GeneratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostBlogController;
use Illuminate\Support\Facades\Artisan;

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

Auth::routes(['verify' => true]);

// Rotas não logados
Route::get('', [PagesController::class, 'home'])->name('home');
Route::get('/home', [PagesController::class, 'home'])->name('home');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
// Fim Rotas não logados

// Rotas logadas no site
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
});
// Fim Rotas logadas no site

// Rotas logadas no sistema
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::resource('/users', UserController::class)->names('users');
    Route::resource('/blog/categories', CategoryBlogController::class)->names('blog.categories');
    Route::resource('/blog/posts', PostBlogController::class)->names('blog.posts');
    Route::get('/users/profile/{user}', [UserController::class, 'profile'])->name('users.profile');
    Route::put('/users/picture/{user}', [UserController::class, 'updatePicture'])->name('users.picture');
    Route::delete('/users/picture/{user}', [UserController::class, 'deletePicture'])->name('users.picture');
});
// Fim Rotas logadas no sistema

//Rotas Generator
Route::get('/generator/create/{model}', [GeneratorController::class, 'generateFiles'])->name('generator.create');
Route::get('/generator/verify/{model}', [GeneratorController::class, 'verifyFiles'])->name('generator.verify');
Route::get('/generator/delete/{model}', [GeneratorController::class, 'deleteFiles'])->name('generator.delete');
Route::get('/generator/alter/{model}', [GeneratorController::class, 'alterBodyFiles'])->name('generator.alter');
//Fim Rotas Generator

//Rotas Hospedado
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";
 });

Route::get('/storage', function(){
    Artisan::call('storage:link');
    return "Link Simbólico Criado!";
});
//Fim Rotas Hospedado
