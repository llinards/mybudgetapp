<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExpensesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/expenses', [ExpensesController::class, 'getAllExpenses']);
Route::post('/expenses', [ExpensesController::class, 'addNewExpense']);
Route::delete('/expenses/{id}', [ExpensesController::class, 'deleteExpense']);
// Route::middleware('auth:api')->get('/getAllExpenses', [ExpensesController::class, 'getAllExpenses']);
// Route::middleware('auth:api')->post('/addNewExpense', [ExpensesController::class, 'addNewExpense']);