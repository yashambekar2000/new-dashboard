<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashbordController;
use views\login;

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


// Route::get('/', function () {
//     return view('dashboard_home');
// });


// Route::get('/devoters', function () {
//     return view('devoters_list');
// });

// Route::get('/devoters/devoter-form', function () {
//     return view('devoter_form');
// });

// Route::get('/donation', function () {
//     return view('donation_list');
// });

// Route::get('/expenses', function () {
//     return view('expenses_list');
// });

// **************for login********************
Route::get( '/', [LoginController::class , 'index1']);
Route::post( '/', [LoginController::class , 'checklogin']);
Route::post( '/expenses', [DashbordController::class , 'expenseAdd']);
Route::get( '/expenses', [DashbordController::class , 'expenseList']);
Route::get( '/donationlist', [DashbordController::class , 'donationlist']);


//  *****************for dashboard devoters*******************
Route::get( '/devoters', [DashbordController::class , 'devotersList']);
Route::get( '/devoters/devoter-form', [DashbordController::class , 'sendForm']);
Route::post( '/devoters/devoter-form', [DashbordController::class , 'addDevoter']);
Route::get( '/devoter/{id}', [DashbordController::class , 'update']);
Route::put( '/devoter-update/{id}', [DashbordController::class , 'updateDetails']);
Route::get( '/devoter-delete/{id}', [DashbordController::class , 'delete']);
Route::get( '/users' , [DashbordController::class , 'showUsers']);