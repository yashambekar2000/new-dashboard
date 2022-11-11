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

//*********************Secured by Middleware********************* 
Route::post( '/expenses', [DashbordController::class , 'expenseAdd'])->middleware('guard');
Route::get( '/expenses', [DashbordController::class , 'expenseList'])->middleware('guard');
Route::get( '/donationlist', [DashbordController::class , 'donationlist'])->middleware('guard');
Route::get( '/dashboard', [DashbordController::class , 'dashboardHome'])->middleware('guard');

//  *****************for dashboard devoters*******************
Route::get( '/devoters', [DashbordController::class , 'devotersList'])->middleware('guard');
Route::get( '/devoters/devoter-form', [DashbordController::class , 'sendForm'])->middleware('guard');
Route::post( '/devoters/devoter-form', [DashbordController::class , 'addDevoter'])->middleware('guard');
Route::get( '/devoter/{id}', [DashbordController::class , 'update'])->middleware('guard');
Route::post( '/devoter-update/{id}', [DashbordController::class , 'updateDetails'])->middleware('guard');
Route::get( '/devoter-delete/{id}', [DashbordController::class , 'delete'])->middleware('guard');

//*************************User Management******************************** */
Route::get( '/users' , [DashbordController::class , 'showUsers'])->middleware('guard');

Route::get( '/addusers' , function(){
    return view('user_form');
})->middleware('guard');

Route::post( '/saveuser' , [DashbordController::class , 'saveUser'])->middleware('guard');
Route::get( '/update-user/{id}' , [DashbordController::class , 'updateUser'])->middleware('guard');
Route::post( '/update-user-add/{id}' , [DashbordController::class , 'addUpdateUser'])->middleware('guard');
Route::get( '/delete-user/{id}', [DashbordController::class , 'deleteUser'])->middleware('guard');


Route::get('/logout-user' , [LoginController::class , 'logout'])->middleware('guard');