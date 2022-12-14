<?php

use Illuminate\Support\Facades\Route;

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
Route::post("login", [\App\Http\Controllers\LoginController::class, "login"]);
Route::group(["middleware" => ["auth"]], function (\Illuminate\Routing\Router $router) {
    $router->apiResource("jobs", \App\Http\Controllers\JobController::class)->only([
        "store",
        "index",
        "update"
    ]);
});
