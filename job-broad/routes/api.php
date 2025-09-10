<?php

// routes/api.php

use App\Http\Controllers\api\V1\PostApiController;
use Illuminate\Support\Facades\Route;

// // Restful Api => HTTP standards
// // create and delete posts
// // Requests: POST, DELETE , GET, PUT, PATCH
// // Responses: 200, 201, 204, 400, 401, 403, 404, 500


Route::prefix("V1")->group(function () {
Route::apiResource("post", PostApiController::class);
});