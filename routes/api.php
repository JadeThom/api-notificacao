<?php

use App\Http\Controllers\Api\NotificacaoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('notificacoes', NotificacaoController::class);
    Route::post('notificacoes/{notificacao}/enviar', [NotificacaoController::class, 'enviar']);
});

Route::apiResource('notificacoes', NotificacaoController::class);
Route::post('notificacoes/{notificacao}/enviar', [NotificacaoController::class, 'enviar']);
