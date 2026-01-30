<?php

namespace App\Jobs;

use App\Services\Integracoes\ImportarUsuarioService;
use App\Services\Notificacao\NotificacaoService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessarUsuarioExternoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public array $usuario
    ) {}

    public function handle(ImportarUsuarioService $importar): void
    {
        $importar->importar($this->usuario);
    }
}
