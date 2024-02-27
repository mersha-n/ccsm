<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\AttorneyController;
use App\Http\Controllers\WittnessController;
use App\Http\Controllers\CaseHearController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\CaseChargeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('language/{locale}', App\Http\Controllers\LocalizationController::class.'@changeLocale')->name('locale');
Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('courts', CourtController::class);
        Route::resource('attorneys', AttorneyController::class);
        Route::resource('judges', JudgeController::class);
        Route::resource('bars', BarController::class);
        Route::resource('case-charges', CaseChargeController::class);
        Route::resource('wittnesses', WittnessController::class);
        Route::resource('case-hears', CaseHearController::class);
        Route::resource('appointments', AppointmentController::class);
        Route::resource('decisions', DecisionController::class);
        Route::get('file-import-export', [UserController::class, 'fileImportExport']);
        Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
        Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
    });
