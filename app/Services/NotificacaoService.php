<?php

namespace App\Services\Notificacao;

use App\Enums\NotificationChannel;
use App\Enums\NotificationStatus;
use App\Models\Notificacao;
use App\Models\NotificacaoLog;
use App\Services\Canais\EmailCanal;
use App\Services\Canais\PushCanal;
use App\Services\Canais\SmsCanal;
use Exception;

class NotificacaoService
{
    public function enviar(Notificacao $notificacao): bool
    {
        $canal = $this->resolverCanal($notificacao->canal);

        try {
            $enviado = $canal->enviar($notificacao);

            if ($enviado) {
                $notificacao->update([
                    'status' => NotificationStatus::ENVIADA,
                    'enviado_em' => now(),
                ]);
            }
            NotificacaoLog::create([
                'notificacao_id' => $notificacao->id,
                'status' => 'enviada',
                'mensagem' => 'Notificação enviada com sucesso'
            ]);

            return $enviado;
        } catch (Exception $e) {
            $notificacao->update([
                'status' => NotificationStatus::FALHA,
            ]);
            NotificacaoLog::create([
                'notificacao_id' => $notificacao->id,
                'status' => 'falha',
                'mensagem' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    private function resolverCanal(NotificationChannel $canal)
    {
        return match ($canal) {
            NotificationChannel::EMAIL => new EmailCanal(),
            NotificationChannel::SMS => new SmsCanal(),
            NotificationChannel::PUSH => new PushCanal(),
        };
    }
}
