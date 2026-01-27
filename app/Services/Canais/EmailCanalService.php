<?php

namespace App\Services\Canais;

use App\Models\Notificacao;
use Illuminate\Support\Facades\Log;

class EmailCanal implements CanalEnvioInterface
{
    public function enviar(Notificacao $notificacao): bool
    {
        // Simulação de envio
        Log::info("Enviando EMAIL: {$notificacao->titulo}");

        return true;
    }
}
