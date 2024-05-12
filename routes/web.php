<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('dashboard.home');
    })->name('home');
});

// Route::get('/', function () {
//     return view('dashboard.home');
// });

// Route::get('/test', function () {
//     return view('dashboard.test');
// });

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

// Route::get('/reset', function () {
//     return view('auth.reset');
// })->name('reset');

// Route::get('/forgot', function () {
//     return view('auth.forgot');
// })->name('forgot');
