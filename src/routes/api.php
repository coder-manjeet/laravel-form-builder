<?php

use CoderManjeet\LaravelFormBuilder\Http\Controllers\API\Forms\FormController;
use CoderManjeet\LaravelFormBuilder\Http\Controllers\API\Forms\FormFieldController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('form/{id}', [FormController::class, 'show']);
Route::get('form/{id}/file-fields', [FormController::class, 'files']);

Route::get('form/{form_id}/fields', [FormFieldController::class, 'index']);
Route::post('form/{form_id}/fields', [FormFieldController::class, 'store']);
Route::get('form/{form_id}/fields/{field_id}', [FormFieldController::class, 'show']);
Route::put('form/{form_id}/fields/{field_id}', [FormFieldController::class, 'update']);
Route::delete('form/{form_id}/fields/{field_id}', [FormFieldController::class, 'destroy']);
Route::post('form/{form_id}/fields/{field_id}/required', [FormFieldController::class, 'toggleRequired']);