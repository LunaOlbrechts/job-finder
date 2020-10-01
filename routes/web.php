<?php

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

// Route for homepage
Route::get('/', function () {
    return view('welcome');
});

// Route for login page
Route::get('/login', function () {
    return view('login');
});

// Route for profile (edit) page of company or student
// TODO: work with id's or make a different route for each
Route::get('/profile', function () {
    return view('profile');
});

// Route for detail page of company
Route::get('/company', function () {
    return view('company');
});

// Route for detail page of a student 
Route::get('/student', function () {
    return view('student');
});



