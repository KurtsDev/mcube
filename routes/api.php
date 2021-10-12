<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\GridController;
use App\Http\Controllers\EmployeesController;

use Illuminate\Support\Facades\Route;

Route::get('/initGridEmployees', [GridController::class, 'indexEmployee']);
Route::get('/initGridDepartments', [GridController::class, 'indexDepartments']);

Route::get('/initDepartmentsList', [DepartmentsController::class, 'index']);
Route::post('/editDepartment', [DepartmentsController::class, 'edit']);
Route::post('/storeDepartment', [DepartmentsController::class, 'store']);
Route::post('/delDepartment', [DepartmentsController::class, 'delete']);

Route::get('/initEmployeesList', [EmployeesController::class, 'index']);
Route::post('/editEmployee', [EmployeesController::class, 'edit']);
Route::post('/storeEmployee', [EmployeesController::class, 'store']);
Route::post('/delEmployee', [EmployeesController::class, 'delete']);

