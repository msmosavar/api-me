<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolePermissionsController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('role-permission', RolePermissionsController::class);
});


Route::middleware(['auth:sanctum'])->get('/user', function () {
    return auth()->user();
});
