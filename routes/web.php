<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ClientAddressController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ServiceOrdersController;
use App\Http\Controllers\OrdersTimetableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', ])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::resource('clients', ClientsController::class);
    Route::resource('client_address', ClientAddressController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('cars', CarController::class);
    Route::resource('service_orders', ServiceOrdersController::class);

    Route::resource('stats', DashboardController::class)->only(['index']);
    Route::post('generate-invoice', [InvoiceController::class, 'generateInvoice'])->name('generate-invoice');
    Route::get('fullcalendar', [OrdersTimetableController::class, 'index']);
    Route::post('fullcalendar-ajax', [OrdersTimetableController::class, 'calendarOrders']);
});


require __DIR__.'/auth.php';
