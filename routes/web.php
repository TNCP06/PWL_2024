<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// BASIC ROUTE
// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('/world', function () {
//     return 'World';
// });

// Route::get('/', function () {
//     return 'Selamat Datang';
// });

// Route::get('/about', function () {
//     return "NIM: 2341720093, Nama: Tionusa Catur Pamungkas";
// });


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// PARAMETER ROUTE
// Route::get('/user/{name}', function($name) {
//     return 'Nama saya ' . $name;
// });

// Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
//     return 'Pos ke-' . $postId . ' Komentar ke-: ' . $commentId;
// });

// Route::get('/articles/{id}', function($id) {
//     return 'Halaman Artikel dengan ID '.$id;
// });


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// OPTIONAL PARAMETERS ROUTE
// Route::get('/user/{name?}', function ($name='John') {
//     return 'Nama saya '.$name;
// });


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ROUTE NAME
// Route::get('/user/profile', function() {
//     //
// })->name('profile');
// Contoh jika ingin memanggil route tersebut
// return redirect()->route('profile');
// <a href="{{ route('profile') }}">Go to Profile</a>

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ROUTE GROUP DAN ROUTE PREFIXES
// ROUTE GROUP
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware... 
    });
    Route::get('/user/profile', function() {
        // Uses first & second middleware... 
    });
});

Route::domain('{account}.example.com')->group(function() {
    Route::get('/user/{id}', function($account, $id) {
        //
    });
});

Route::middleware('auth')->group(function() {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

// ROUTE PREFIXES
Route::prefix('admin')->group(function() {
    Route::get('/user', [UserController::class, 'index']); // /admin/user
    Route::get('/post', [PostController::class, 'index']); // /admin/post
    Route::get('/event', [EventController::class, 'index']); //admin/event
});

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// REDIRECT ROUTE
Route::redirect('/here', '/there');

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// VIEW ROUTE
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);