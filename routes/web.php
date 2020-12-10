<?php

use App\Http\Controllers\Application;
use App\Http\Controllers\ApplicationController;
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
use App\Http\Controllers\TrainStationController;


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

// Route::middleware(['web'],[ 'company'])->group(function(){
//     Route::get('/internships', [InternshipController::class, 'index']);

// });
// Route for internships
Route::get('/internships', [InternshipController::class, 'index'])->middleware(['auth:web'],['auth:company']);
Route::post('/internships', [InternshipController::class, 'index'])->middleware(['auth:web'],['auth:company']);

Route::get('/internships/{internship}/detail', [InternshipController::class, 'detail'])->middleware(['auth:web'],['auth:company']);
Route::post('/internships/{internship}/detail', [InternshipController::class, 'apply'])->middleware(["auth:web"]);


Route::get('/internships/create/{company_id}', [InternshipController::class, 'create'])->middleware(["auth:company"]);
Route::post('/internships', [InternshipController::class, 'createInternship'])->middleware(["auth:company"]);

// Route for register and login student
Route::get('/register/student', [RegisterController::class, 'showStudentRegisterForm'])->name('register/student');
Route::get('/login/student', [LoginController::class, 'showStudentLoginForm'])->name('login/student');

Route::post('/login/student', [LoginController::class, 'studentLogin']);
Route::post('/register/student', [RegisterController::class, 'createStudent']);

// Route for register and login company
Route::get('/register/company', [RegisterController::class, 'showCompanyRegisterForm'])->name('register/company');
Route::get('/login/company', [LoginController::class, 'showCompanyLoginForm'])->name('login/company');

Route::post('/login/company', [LoginController::class, 'companyLogin']);
Route::post('/register/company', [RegisterController::class, 'createCompany']);

// Route for companies
Route::get('/companies', [CompanyController::class, 'index'])->middleware(['auth:web'], ['auth:company']);

// Route for company profile
Route::get('/companies/{company}', [CompanyController::class, 'profile'])->middleware(['auth:web'], ['auth:company']);

// Route for application filtering
Route::patch('/companies/{companyId}/applications', [ApplicationController::class, 'editApplicationFase'])->name('editApplicationFase')->middleware(["auth:company"]);
Route::get('/companies/{companyId}/applications', [ApplicationController::class, 'showListOfAllApplications'])->name('company/applications')->middleware(["auth:company"]);
Route::post('/companies/{companyId}/applications', [ApplicationController::class, 'filterApplications'])->name('filterApplications')->middleware(["auth:company"]);

// Route for students
Route::get('/students', [StudentController::class, 'index'])->middleware(['auth:web'], ['auth:company']);

// Route for student profile
Route::get('/students/{student}', [StudentController::class, 'profile'])->middleware(['auth:web'], ['auth:company']);

// Route for update student profile
Route::get('/students/{student}/update', [StudentController::class, 'editUserProfile'])->name('students/edit')->middleware(["auth:web"]);
Route::post('/students/{student}/update', [StudentController::class, 'updateUserProfile'])->name('students/update')->middleware(["auth:web"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');