<?php

use App\Http\Controllers\categoryController;
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
Route::get('/Userprofile',[userController::class,'Userprofile'])->middleware([VerifyTokenMiddleware::class]);
Route::post('/UpdateUserProfile',[userController::class,'UpdateUserProfile'])->middleware([VerifyTokenMiddleware::class]);
Route::get('/Logout',[userController::class,'Logout']);




Route::get('/Login',[userController::class,'LoginPage']);
Route::get('/Registration',[userController::class,'UserRegistrationPage']);
Route::get('/sendOtp',[userController::class,'SendOtpPage']);
Route::get('/verifyOtp',[userController::class,'VerifyOtpPage']);
Route::get('/Resetpassword',[userController::class,'ResetPasswordPage'])->middleware([VerifyTokenMiddleware::class]);


Route::get('/Dashboard',[userController::class,'DashBoardPage'])->middleware([VerifyTokenMiddleware::class]);

Route::get('/User',[userController::class,'Userpage'])->middleware([VerifyTokenMiddleware::class]);
Route::get('/UserprofilePage',[userController::class,'UserprofilePage'])->middleware([VerifyTokenMiddleware::class]);
Route::get('/UpdateUserProfilePage',[userController::class,'UpdateUserProfilePage'])->middleware([VerifyTokenMiddleware::class]);


Route::get('/Category',[categoryController::class,'CategoryPage'])->middleware([VerifyTokenMiddleware::class]);


