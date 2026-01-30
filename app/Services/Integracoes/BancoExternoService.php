<?php

namespace App\Services\Integracoes;

use App\Models\Externo\UsuarioExterno;
use Illuminate\Support\Facades\Log;

class BancoExternoService
{
    public function buscarUsuarios(): array
    {
        try {
            return UsuarioExterno::query()
                ->get()
                ->toArray();
        } catch (\Throwable $e) {
            Log::error('Erro ao buscar dados do banco externo', [
                'erro' => $e->getMessage(),
            ]);

            return [];
        }
    }
}
