<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Integracoes\BancoExternoService;
use App\Jobs\ProcessarUsuarioExternoJob;

class ImportarUsuariosExternos extends Command
{
    protected $signature = 'externo:importar-usuarios';
    protected $description = 'Importa usuários do banco externo';

    public function handle(BancoExternoService $service)
    {
        $usuarios = $service->buscarUsuarios();

        foreach ($usuarios as $usuario) {
            ProcessarUsuarioExternoJob::dispatch($usuario);
        }

        $this->info('Usuários enviados para processamento');
    }
}
