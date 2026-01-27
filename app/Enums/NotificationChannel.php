<?php

namespace App\Enums;

enum NotificationChannel: string
{
    case SISTEMA = 'sistema';
    case EMAIL = 'email';
    case PUSH = 'push';


    public static function valores(): array
    {
        return array_column(self::cases(), 'value');
    }
}
