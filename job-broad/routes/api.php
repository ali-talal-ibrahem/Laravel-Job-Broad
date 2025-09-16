<?php

// routes/api.php

use App\Http\Controllers\api\V1\AuthApiController;
use App\Http\Controllers\api\V1\PostApiController;
use Illuminate\Support\Facades\Route;

// // Restful Api => HTTP standards
// // create and delete posts
// // Requests: POST, DELETE , GET, PUT, PATCH
// // Responses: 200, 201, 204, 400, 401, 403, 404, 500
// POST /V1/auth/login
// POST /V1/auth/me
// GET  /V1/auth/logout
// POST /V1/auth/refresh

Route::prefix("V1")->group(function () {
    Route::apiResource("post", PostApiController::class)->middleware("auth:api");

    Route::prefix("auth")->group(function () {
        Route::post('login', [AuthApiController::class, 'login']);

        // only if i am authenticated with JWT (Authorization Header)
        Route::middleware('auth:api')->group(function () {
            Route::post('refresh', [AuthApiController::class, 'refresh']);
            Route::get('me', [AuthApiController::class, 'me']);
            Route::post('logout', [AuthApiController::class, 'logout']);
        });
    });
});
