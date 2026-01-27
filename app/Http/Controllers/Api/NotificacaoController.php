<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificacaoRequest;
use App\Http\Resources\NotificacaoResource;
use App\Models\Notificacao;
use App\Services\Notificacao\NotificacaoService;

class NotificacaoController extends Controller
{
    public function index()
    {
        return NotificacaoResource::collection(
            Notificacao::latest()->paginate(10)
        );
    }

    public function store(StoreNotificacaoRequest $request)
    {
        $notificacao = Notificacao::create($request->validated());

        return new NotificacaoResource($notificacao);
    }

    public function show(Notificacao $notificacao)
    {
        return new NotificacaoResource($notificacao);
    }

    public function enviar(Notificacao $notificacao, NotificacaoService $service)
    {
        $service->enviar($notificacao);

        return response()->json([
            'mensagem' => 'Notificação enviada com sucesso'
        ]);
    }
}
