<?php

use App\Http\Controllers\CvCreateController;
use App\Http\Controllers\CvDeleteController;
use App\Http\Controllers\CvEditController;
use App\Http\Controllers\CvListController;
use App\Http\Controllers\CvViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CvListController::class, 'main']);
Route::get('cv_create', [CvCreateController::class, 'main']);
Route::post('cv_create/save', [CvCreateController::class, 'save']);
Route::post('delete/{id}',[CvDeleteController::class, 'delete']);
Route::post('cv_edit/{user}', [CvEditController::class, 'main']);
Route::post('cv_edit/save', [CvEditController::class, 'save']);
Route::post('cv_view/{user}', [CvViewController::class, 'main']);
Route::post('cv_edit/update/{user}',[CvEditController::class, 'update']);
