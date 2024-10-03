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
//displays all jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});
//create
Route::get('jobs/create', function () {
    return view('jobs.create');
});
//show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});
//store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    $job = new Job();
    $job->title = request('title');
    $job->salary = request('salary');
    $job->employer_id = 1;
    $job->save();

    return redirect('/jobs');
});
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});
//update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    $job_id = str_replace("", '', $id);
    $job = Job::findOrFail($job_id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);
    return redirect('/jobs/' . $job->id);
});
//destroy
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id)->delete();
    return redirect('/jobs');
});
Route::get('/contact', function () {
    return view('contact');
});
