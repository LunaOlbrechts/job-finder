<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;

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

// Route for companies
Route::get('/companies', [CompanyController::class, 'index']);

// Route for company profile
Route::get('/companies/{company}', [CompanyController::class, 'detail']);

// Route for students
Route::get('/students', [StudentController::class, 'index']);

// Route for student profile
Route::get('/students/{student}', [StudentController::class, 'show']);
