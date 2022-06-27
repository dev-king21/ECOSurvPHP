<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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
Route::get('/', [BreedController::class, 'index']);

Route::view('/welcome', 'welcome');

Route::get('/breed', [BreedController::class, 'store']);

Route::get('/breed/random',[BreedController::class, 'randomBreed']);

Route::get('/breed/{breed}',[BreedController::class, 'breedData']);

Route::get('/breed/{breed}/image',[BreedController::class, 'breedImage']);

Route::get('/breed/{breed}/images',[BreedController::class, 'breedImages']);

Route::post('/user/{user_id}/associate', [UserController::class, 'store']);

Route::post('/park/{park_id}/breed', [BreedController::class, 'parks']);

// Route::get('/breed/{breed_id}/data', [BreedController::class, 'breedData']);
