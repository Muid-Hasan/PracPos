<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Middleware\VerifyTokenMiddleware;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/UserRegistration',[userController::class, 'UserRegistation']);
Route::post('/UserLogin',[userController::class, 'UserLogin']);
Route::post('/sendOtp',[userController::class, 'SendOtp']);
Route::post('/VerifyOtp',[userController::class, 'VerifyOtp']);
Route::post('/ResetPassword',[userController::class, 'ResetPassword'])->middleware([VerifyTokenMiddleware::class]);
Route::post('/DashBoardSummery',[userController::class, 'DashBoardSummery']);

Route::get('/Logout',[userController::class,'Logout']);




Route::get('/Login',[userController::class,'LoginPage']);
Route::get('/Registration',[userController::class,'UserRegistrationPage']);
Route::get('/sendOtp',[userController::class,'SendOtpPage']);
Route::get('/verifyOtp',[userController::class,'VerifyOtpPage']);
Route::get('/Resetpassword',[userController::class,'ResetPasswordPage']);


Route::get('/Dashboard',[userController::class,'DashBoardPage']);
Route::get('/Home',[userController::class,'Homepage']);
Route::get('/Sales',[userController::class,'Salespage']);
Route::get('/Reports',[userController::class,'Reportpage']);
Route::get('/Settings',[userController::class,'Settingpage']);

Route::get('/Products',[userController::class,'Productpage']);

