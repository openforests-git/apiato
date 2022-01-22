<?php

/**
 * @apiGroup           Authentication
 * @apiName            VerifyEmail
 *
 * @api                {POST} /v1/email/verify/:id/:hash Verify Email
 * @apiDescription     Verify user email
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {}
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('email/verify/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail']);

