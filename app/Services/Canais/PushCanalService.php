<?php

namespace App\Services\Canais;

use App\Models\Notificacao;
use Illuminate\Support\Facades\Log;

class PushCanal implements CanalEnvioInterface
{
    public function enviar(Notificacao $notificacao): bool
    {
        Log::info("Enviando PUSH: {$notificacao->titulo}");

        return true;
    }
}
