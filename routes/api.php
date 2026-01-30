<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NotificacaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->middleware('auth:sanctum')
    ->group(function () {

        Route::apiResource('notificacoes', NotificacaoController::class);

        Route::post(
            'notificacoes/{notificacao}/enviar',
            [NotificacaoController::class, 'enviar']
        );
    });
Route::post('login', [AuthController::class, 'login']);



