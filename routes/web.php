<?php

use App\Http\Controllers\Auth\Create_internship;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route for profile (edit) page of company or student
// TODO: work with id's or make a different route for each
Route::get('/profile', function () {
    return view('profile');
});

// Route for internships
Route::get('/internships', [InternshipController::class, 'index']);
Route::post('/internships', [InternshipController::class, 'index']);

Route::get('/internships/create', [Create_internship::class, 'showInternshipRegisterForm']);
Route::post('/internships/create', [Create_internship::class, 'createInternship']);


// Route for internship vacature
Route::get('/login/student', [LoginController::class, 'showStudentLoginForm'])->name('login/student');
Route::get('/login/company', [LoginController::class, 'showCompanyLoginForm'])->name('login/company');
Route::get('/register/student', [RegisterController::class, 'showStudentRegisterForm'])->name('register/student');
Route::get('/register/company', [RegisterController::class, 'showCompanyRegisterForm'])->name('register/company');

Route::post('/login/student', [LoginController::class, 'studentLogin']);
Route::post('/login/company', [LoginController::class, 'companyLogin']);
Route::post('/register/student', [RegisterController::class, 'createStudent']);
Route::post('/register/company', [RegisterController::class, 'createCompany']);

// Route for companies
Route::get('/companies', [CompanyController::class, 'index']);

// Route for company profile
Route::get('/companies/{company}', [CompanyController::class, 'profile']);

// Route for students
Route::get('/students', [StudentController::class, 'index']);

// Route for student profile
Route::get('/students/{student}', [StudentController::class, 'profile']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');