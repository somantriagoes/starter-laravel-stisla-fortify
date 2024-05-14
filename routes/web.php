<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

    date_default_timezone_set('Asia/Jakarta');
    $h = date('G');

    $user_ip = getenv('REMOTE_ADDR');
    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

    if ($h >= 5 && $h <= 11) {
        $great_current_time = 'Good Morning';
    } elseif ($h >= 12 && $h <= 18) {
        $great_current_time = 'Good Afternoon';
    } else {
        $great_current_time = 'Good Evening';
    }

    $data = array(
        'great_current_time' => $great_current_time,
        'city' => $geo["geoplugin_city"],
        'country' => $geo["geoplugin_countryName"]
    );

    return view('auth.login', $data);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', function () {
        return view('dashboard.home');
    })->name('home')->middleware('can:dashboard');

    Route::get('edit-profile', function(){
        return view('profile.edit');
    })->name('profile.edit');

    Route::get('edit-password', function(){
        return view('auth.edit-password');
    })->name('auth.edit-password');

    Route::resources([
        'user' => UserController::class,
    ]);
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
