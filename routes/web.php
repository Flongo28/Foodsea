<?php

use App\ChefkochAPI\ChefkochAPI;
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
    return view('welcome');
});

Route::get('/search', function () {
    $categories = ChefkochAPI::get_categories();

    // Check if there are any validation errors flashed to the session
    if(session()->has('errors')) {
        $errors = session()->get('errors')->getBag('default');
        // Pass the errors to the view
        return view('filters', ["categories" => $categories, "errors" => $errors]);
    }

    return view('filters', ["categories" => $categories]);
})->name('search');

Route::get('/result', function () {

    $zutaten = request()->input('zutaten');
    $filter_options = [
        "zutaten" => $zutaten
    ];

    $min_kochzeit = request()->input('min_kochzeit');
    if ($min_kochzeit != 0) {
        $filter_options["min_kochzeit"] = $min_kochzeit;
    }

    $max_kochzeit = request()->input('max_kochzeit');
    if ($max_kochzeit != 120) {
        $filter_options["max_kochzeit"] = $max_kochzeit;
    }
    
    $rating = request()->input('rating');
    if ($rating != 0) {
        $filter_options["rating"] = $rating;
    }

    $name = request()->input('name');
    if ($name != "") {
        $filter_options["name"] = $name;
    }    

    $categories = request()->input('categories');
    return view('recipes', ["categories" => $categories, "filter_options" => $filter_options]);
    
})->name('result');

Route::get('/concept', function () {
    return view('concept');
})->name('concept');

Auth::routes();

// Favourites Routes
Route::get('/favourites', [App\Http\Controllers\FavouriteController::class, 'index'])->name('favourites')->middleware('auth');
Route::get('/favourites/delete/{recepe_id}', [App\Http\Controllers\FavouriteController::class, 'delete'])->name('favourites/delete')->middleware('auth');
Route::get('/favourites/create/{recepe_id}', [App\Http\Controllers\FavouriteController::class, 'create'])->name('favourites/create')->middleware('auth');

// Recipe Routes
Route::get('/recipe/delete/{id}', [App\Http\Controllers\RecipeController::class, 'show'])->name('recipe');

// Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authentication Routes...
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/logout_user', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout_user');

// Registration Routes...
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);

