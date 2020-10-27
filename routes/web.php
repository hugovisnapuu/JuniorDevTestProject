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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin routes
Route::prefix('admin')->group(function () {
    // Login
    Route::get('/login', 'Auth\AdminLoginController@showloginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
    // Index methods
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/managers', 'AdminController@showAllManagers')->name('admin.managers');
    Route::get('/companies', 'AdminController@showAllCompanies')->name('admin.companies');
    // Add managers
    Route::get('/manager/add', 'AdminController@createManager')->name('admin.add.manager');
    Route::post('/manager/store', 'AdminController@storeManager')->name('admin.store.manager');
    // Show methods
    Route::get('/{manager}', 'AdminController@showManager');
    Route::get('/{manager}/{company}', 'AdminController@showCompany');
    // Edit methods
    Route::get('/{manager}/{company}/edit', 'AdminController@editCompanyManager');
    // Update routes
    Route::patch('{manager}/{company}', 'AdminController@updateCompanyManager');
    // Delete managers
    Route::get('/{manager}/delete/attempt', 'AdminController@attemptToDeleteManager');
});

// manager routes
Route::prefix('manager')->group(function () {
    // Login
    Route::get('/login', 'Auth\ManagerLoginController@showLoginForm')->name('manager.login');
    Route::post('/login', 'Auth\ManagerLoginController@Login')->name('manager.login.submit');

    Route::get('/', 'ManagerController@index')->name('manager.dashboard');
    Route::get('/{manager}/company/add', 'ManagerController@addCompany')->name('manager.add.company');
    Route::post('/{manager}/company', 'ManagerController@saveCompany')->name('manager.company.submit');
    Route::get('/{manager}/companies/list', 'ManagerController@showCompanies')->name('manager.companies.list');
    // Route::get('/logout', 'ManagerController@logout')->name('manager.logout');
});

// companies routes

Route::get('/manager/{manager}/{company}', 'CompanyController@index');
Route::delete('/manager/{manager}/{company}', 'CompanyController@destroy');



// employees routes
Route::resource('employees', 'EmployeesController');

