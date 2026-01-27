<?php

namespace App\Enums;

enum NotificationStatus: string
{
    case PENDENTE = 'pendente';
    case ENVIADA = 'enviada';
    case FALHA = 'falha';


    public static function valores(): array
    {
        return array_column(self::cases(), 'value');
    }
}
