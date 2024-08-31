<?php

use App\Http\Controllers\DoorprizeController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(EmployeeController::class)->group(function() {
    Route::get('/employee', 'index')->name('employee.index');
    Route::post('/employee/import', 'import')->name('employee.import');
    Route::delete('/employee/delete', 'delete')->name('employee.delete');
    Route::post('/employee/reset', 'reset')->name('employee.reset');
});

Route::controller(DoorprizeController::class)->group(function() {
    Route::get('/', 'index')->name('doorprize.index');
    Route::post('/doorprize', 'doorprize')->name('doorprize');
});