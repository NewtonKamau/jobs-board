<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Http\Controllers\JobController;
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
    return view('home');
});
//displays all jobs
Route::get('/jobs', [JobController::class, 'index']);
//create
Route::get('jobs/create', [JobController::class, 'create']);
//show
Route::get('/jobs/{job}', [JobController::class, 'show']);
//store
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
//update
Route::patch('/jobs/{job}', [JobController::class, 'update']);
//destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
Route::get('/contact', function () {
    return view('contact');
});
