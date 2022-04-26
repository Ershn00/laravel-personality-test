<?php

use App\Http\Controllers\PersonalityTestController;
use App\Http\Controllers\TestQuestionController;
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

Route::get('/', [PersonalityTestController::class, 'index'])
    ->name('index');

Route::post('/result', [PersonalityTestController::class, 'endTest'])
    ->name('result');

Route::resource('questions', TestQuestionController::class);
