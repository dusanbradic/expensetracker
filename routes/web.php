<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('transaction/create', [TransactionController::class, 'create']);
// Route::post('transaction', [TransactionController::class, 'store']);

// Route::get('/', [TransactionControllerController::class, 'create']);

Route::controller(TransactionController::class)->group(function () {
    Route::get('/', 'index')->name('transactions.index');
    Route::get('/filter', 'filter')->name('transactions.filter');
    Route::get('/transactions/income', 'show_income')->name('transactions.show_income');
    Route::get('/transactions/expense', 'show_expense')->name('transactions.show_expense');
    // Route::get('/transactions/{id}', 'show')->name('transactions.show);
    Route::get('transactions/create', 'create')->name('transactions.create');
    Route::post('transactions', 'store')->name('transactions.store');
    Route::get('transactions/{transaction}/edit', 'edit')->name('transactions.edit');
    Route::put('transactions/{transaction}', 'update')->name('transactions.update');
    Route::delete('transactions/{transaction}', 'destroy')->name('transactions.destroy');
});
