<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SlfController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/slf/json', [SlfController::class,'json'])->name('slf.json');
Route::get('/slf/search_json', [SlfController::class,'search_json'])->name('slf.search.json');
Route::get('/slf/show_json/{gid}', [SlfController::class,'show_json'])->name('slf.show.json');
Route::post('/slf/store_json', [SlfController::class,'store_json'])->name('slf.store.json');
Route::delete('/slf/delete_json/{gid}', [SlfController::class,'delete_json'])->name('slf.delete.json');