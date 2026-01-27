<?php

namespace App\Services\Canais;

use App\Models\Notificacao;

interface CanalEnvioInterface
{
    public function enviar(Notificacao $notificacao): bool;
}
