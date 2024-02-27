<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BarController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\CourtController;
use App\Http\Controllers\Api\JudgeController;
use App\Http\Controllers\Api\AttorneyController;
use App\Http\Controllers\Api\WittnessController;
use App\Http\Controllers\Api\CaseHearController;
use App\Http\Controllers\Api\DecisionController;
use App\Http\Controllers\Api\CourtBarsController;
use App\Http\Controllers\Api\CaseChargeController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\CourtJudgesController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\CourtAttorneysController;
use App\Http\Controllers\Api\CourtCaseHearsController;
use App\Http\Controllers\Api\JudgeCaseHearsController;
use App\Http\Controllers\Api\AttorneyCaseHearsController;
use App\Http\Controllers\Api\WittnessCaseHearsController;
use App\Http\Controllers\Api\CaseHearDecisionsController;
use App\Http\Controllers\Api\CaseChargeCaseHearsController;
use App\Http\Controllers\Api\CaseHearAppointmentsController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('courts', CourtController::class);

        // Court Attorneys
        Route::get('/courts/{court}/attorneys', [
            CourtAttorneysController::class,
            'index',
        ])->name('courts.attorneys.index');
        Route::post('/courts/{court}/attorneys', [
            CourtAttorneysController::class,
            'store',
        ])->name('courts.attorneys.store');

        // Court Judges
        Route::get('/courts/{court}/judges', [
            CourtJudgesController::class,
            'index',
        ])->name('courts.judges.index');
        Route::post('/courts/{court}/judges', [
            CourtJudgesController::class,
            'store',
        ])->name('courts.judges.store');

        // Court Bars
        Route::get('/courts/{court}/bars', [
            CourtBarsController::class,
            'index',
        ])->name('courts.bars.index');
        Route::post('/courts/{court}/bars', [
            CourtBarsController::class,
            'store',
        ])->name('courts.bars.store');

        // Court Case Hears
        Route::get('/courts/{court}/case-hears', [
            CourtCaseHearsController::class,
            'index',
        ])->name('courts.case-hears.index');
        Route::post('/courts/{court}/case-hears', [
            CourtCaseHearsController::class,
            'store',
        ])->name('courts.case-hears.store');

        Route::apiResource('attorneys', AttorneyController::class);

        // Attorney Case Hears
        Route::get('/attorneys/{attorney}/case-hears', [
            AttorneyCaseHearsController::class,
            'index',
        ])->name('attorneys.case-hears.index');
        Route::post('/attorneys/{attorney}/case-hears', [
            AttorneyCaseHearsController::class,
            'store',
        ])->name('attorneys.case-hears.store');

        Route::apiResource('judges', JudgeController::class);

        // Judge Case Hears
        Route::get('/judges/{judge}/case-hears', [
            JudgeCaseHearsController::class,
            'index',
        ])->name('judges.case-hears.index');
        Route::post('/judges/{judge}/case-hears', [
            JudgeCaseHearsController::class,
            'store',
        ])->name('judges.case-hears.store');

        Route::apiResource('bars', BarController::class);

        Route::apiResource('case-charges', CaseChargeController::class);

        // CaseCharge Case Hears
        Route::get('/case-charges/{caseCharge}/case-hears', [
            CaseChargeCaseHearsController::class,
            'index',
        ])->name('case-charges.case-hears.index');
        Route::post('/case-charges/{caseCharge}/case-hears', [
            CaseChargeCaseHearsController::class,
            'store',
        ])->name('case-charges.case-hears.store');

        Route::apiResource('wittnesses', WittnessController::class);

        // Wittness Case Hears
        Route::get('/wittnesses/{wittness}/case-hears', [
            WittnessCaseHearsController::class,
            'index',
        ])->name('wittnesses.case-hears.index');
        Route::post('/wittnesses/{wittness}/case-hears', [
            WittnessCaseHearsController::class,
            'store',
        ])->name('wittnesses.case-hears.store');

        Route::apiResource('case-hears', CaseHearController::class);

        // CaseHear Decisions
        Route::get('/case-hears/{caseHear}/decisions', [
            CaseHearDecisionsController::class,
            'index',
        ])->name('case-hears.decisions.index');
        Route::post('/case-hears/{caseHear}/decisions', [
            CaseHearDecisionsController::class,
            'store',
        ])->name('case-hears.decisions.store');

        // CaseHear Appointments
        Route::get('/case-hears/{caseHear}/appointments', [
            CaseHearAppointmentsController::class,
            'index',
        ])->name('case-hears.appointments.index');
        Route::post('/case-hears/{caseHear}/appointments', [
            CaseHearAppointmentsController::class,
            'store',
        ])->name('case-hears.appointments.store');

        Route::apiResource('appointments', AppointmentController::class);

        Route::apiResource('decisions', DecisionController::class);
    });
