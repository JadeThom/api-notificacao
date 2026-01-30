<?php

namespace App\Services\Integracoes;

use App\Enums\NotificationChannel;
use App\Enums\NotificationStatus;
use App\Models\Notificacao;
use App\Models\NotificacaoLog;
use App\Models\User;
use App\Services\Canais\EmailCanal;
use App\Services\Canais\PushCanal;
use App\Services\Canais\SmsCanal;
use Exception;
use Illuminate\Support\Str;

class ImportarUsuarioService
{
    public function importar(array $dados): User
    {
        return User::updateOrCreate(
            ['external_id' => $dados['id']],
            [
                'name' => $dados['name'],
                'email' => $dados['email'],
                'password' => bcrypt(Str::random(12)),
            ]
        );
    }
}
