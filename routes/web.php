<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('pageinscription', function () {
    return view('pageinscription');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('Authentification.register');
// });

Route::resource('entreprise', EntrepriseController:: class);

// Route::get('pageinscription', [AuthentificationController:: class, 'index'])->name('pageinscription');

Route::get('supprimer-entreprise/{id}' , [EntrepriseController::class, 'destroy']);

Route::resource('blog', BlogController:: class);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('supprimer-blog/{id}' , [BlogController::class, 'destroy']);

// Route::post('/login',[AuthentificationController::class, 'login'] )->name('login');
// Route::get('/login',[AuthentificationController::class, 'loginn'] )->name('login');
// Route::get('/logout',[AuthentificationController::class, 'logout'] )->name('logout');
// Route::get('register',[AuthentificationController::class, 'register'] )->name('register');

Route::resource('commentaire', CommentaireController:: class);
Route::resource('annonce', AnnonceController:: class);
Route::resource('categorie', CategorieController:: class);
