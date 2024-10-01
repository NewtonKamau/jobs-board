<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
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
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});
Route::get('jobs/create', function () {
    return view('jobs.create');
});
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});
Route::post('/jobs', function () {
    $job = new Job();
    $job->title = request('title');
    $job->salary = request('salary');
    $job->employer_id = 1;
    $job->save();

    return redirect('/jobs');
});
Route::get('/contact', function () {
    return view('contact');
});
