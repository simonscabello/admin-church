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
    return view('auth/login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/prayer-requests', 'PrayerRequestController@index')->name('prayer.requests');
    Route::put('/prayer-requests/{id}', 'PrayerRequestController@update');
    Route::resource('members', MemberController::class);
    Route::resource('events', EventController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('properties', PropertieController::class);
    Route::resource('tithes', TitheController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('churches', ChurchController::class);
    Route::resource('visitors', VisitorController::class);
    Route::resource('records', RecordController::class)->except(['edit', 'update']);
    Route::resource('reports', ReportController::class);
});
