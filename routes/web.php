<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Events\Logout;
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
    return view('principal');
});
/* tutas nombradas */
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register');


/* Rutas para el perfil */
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('{user:username}/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
/* Muro */
/* Route::get('/muro',[PostController::class,'index'])->name('post.index'); */
/* lOGIN */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

/* Cerrar sesion */
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
/* ruta para la carga de imagenes */
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

/* Likes */
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
/* Elimina post */
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('comentarios.destoy');
/* Ruta para el metodo de mostrar la imagen al dar clic en el post */
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
/* tener en cuenta de que el orden en las rutas si importa, ya que estas veriofican, si esta ruta esta antes que als demas primero brinca la verificacion */
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');



  

