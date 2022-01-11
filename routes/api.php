<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ministriesController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\DisciplerController;
use App\Http\Controllers\DiscipleController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\GoalsController;

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

Route::post('/create',[AuthController::class,'Register']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/newMember',[memberController::class,'newMember'])->middleware('auth:sanctum');

Route::get('/ministries',[ministriesController::class,'getMinistries'])->middleware('auth:sanctum');

Route::get('/roles',[roleController::class,'roleController'])->middleware('auth:sanctum');

Route::post('/report',[DiscipleController::class,'saveReport'])->middleware('auth:sanctum');

Route::get('/getExcel',[ReportController::class,'getExcel'])->middleware('auth:sanctum');

Route::get('/getMembers',[memberController::class,'getMembers'])->middleware('auth:sanctum');

Route::post('/getMembersByMinistrie',[memberController::class,'getMembersByMinistrie'])->middleware('auth:sanctum');

Route::post('/assignDiscipler',[DisciplerController::class,'assignDiscipler'])->middleware('auth:sanctum');

Route::post('/assignDisciple',[DiscipleController::class,'assignDisciple'])->middleware('auth:sanctum');

Route::get('/getDiscipler',[DisciplerController::class,'getDisciplers'])->middleware('auth:sanctum');

Route::post('/getDisciplesByDiscipler',[DiscipleController::class,'getDiscipleByDisciple'])->middleware('auth:sanctum');

Route::post('/transferDisciple',[DiscipleController::class,'transferDisciple'])->middleware('auth:sanctum');

Route::post('/withdrawDisciple',[DiscipleController::class,'deleteDisciple'])->middleware('auth:sanctum');

Route::get('/getDisciples',[DiscipleController::class,'getDisciples'])->middleware('auth:sanctum');

Route::get('/getLessons',[LessonsController::class,'getLessons'])->middleware('auth:sanctum');

Route::get('/getGoals',[GoalsController::class,'getGoals'])->middleware('auth:sanctum');
