<?php

namespace App\Services\Canais;

use App\Models\Notificacao;
use Illuminate\Support\Facades\Log;

class SmsCanal implements CanalEnvioInterface
{
    public function enviar(Notificacao $notificacao): bool
    {
        Log::info("Enviando SMS: {$notificacao->titulo}");

        return true;
    }
}
