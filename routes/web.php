<?php
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\ListingContorller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Models\Listing;
use App\Http\Middleware\ControllerAfter;
use Illuminate\Support\Facades\Auth;

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
// All listings
Route::get('/Addon', [ListingContorller::class, 'addon']);

// addon making 
Route::get('/Addon/create', [ListingContorller::class,'create'])->middleware('auth');

Route::get('/', [ListingContorller::class,'index']);

Route::get('/send',[MailController::class,'email']);

// Store data
Route::post('/Addon/store', [ListingContorller::class,'store'])->middleware('auth');

Route::get('/Addon/{listing}/edit',[ListingContorller::class, 'edit'])->middleware('auth');

Route::put('/Addon/{listing}', [ListingContorller::class,'update'])->middleware('auth');

Route::get('/Addon/manage',[ListingContorller::class, 'manage'])->middleware('auth');

Route::delete('/Addon/{listing}', [ListingContorller::class,'destroy'])->middleware('auth');

Route::get('/Addon/{listing}', [ListingContorller::class,'show']);

Route::get('/register', [UserController::class,'create'])->middleware('guest');

Route::post('/users', [UserController::class,'store']);

Route::get('/logout', [UserController::class,'logout'])->middleware('auth');

Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class,'authenticate']);
