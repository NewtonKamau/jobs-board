<?php

use Illuminate\Support\Arr;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Web Developer',
                'salary' => '$1000'
            ],
            [
                'id' => 2,
                'title' => 'Web Designer',
                'salary' => '$2000'
            ],
            [
                'id' => 3,
                'title' => 'Security analyst',
                'salary' => '$3000'
            ]

        ]
    ]);
});
Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Web Developer',
            'salary' => '$1000'
        ],
        [
            'id' => 2,
            'title' => 'Web Designer',
            'salary' => '$2000'
        ],
        [
            'id' => 3,
            'title' => 'Security analyst',
            'salary' => '$3000'
        ]

    ];
    $job = Arr::first($jobs, fn ($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});
Route::get('/contact', function () {
    return view('contact');
});
