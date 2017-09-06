<?php

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
    return view('welcome');
})->name('/');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('admin', 'AdminController', ['only' => ['show', 'edit', 'update']]);
    Route::resource('teacher', 'TeacherController',['except' => ['create','store']]);
    Route::resource('student', 'StudentController',['except' => ['create','store']]);
    Route::get('/job/viewPostedJobs/{id}', ['as'=>'job.viewPostedJobs','uses'=>'JobController@jobsPostedByTeacher']);
    Route::get('/job/viewJobApplications/{id}', ['as'=>'job.viewJobApplications','uses'=>'JobController@viewJobApplications']);
    Route::get('/student/{student_id}/job/{job_id}/updateJobApplicationStatus/{status}', ['uses'=>'JobController@updateJobApplicationStatus']);
    Route::get('/student/{student_id}/applyJob/{job_id}', ['uses'=>'StudentController@applyJob']);
    Route::resource('job', 'JobController');
});
