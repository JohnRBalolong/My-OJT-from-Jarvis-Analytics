<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('students1', [StudentsController::class, 'create']);
Route::get('students', [StudentsController::class, 'index']);
Route::post('students', [StudentsController::class, 'store']);
Route::get('students/{id}', [StudentsController::class, 'show']);
Route::get('students/{id}/edit', [StudentsController::class, 'edit']);
Route::put('students/{id}/edit', [StudentsController::class, 'update']);
Route::delete('students/{id}/delete', [StudentsController::class, 'destroy']);