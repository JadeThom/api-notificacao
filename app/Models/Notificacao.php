<?php

namespace App\Models;

use App\Enums\NotificationChannel;
use App\Enums\NotificationStatus;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    protected $table = 'notificacoes';


    protected $fillable = [
        'titulo',
        'mensagem',
        'canal',
        'status',
        'enviado_em',
    ];


    protected $casts = [
        'lida_em' => 'datetime',
        'canal' => NotificationChannel::class,
        'status' => NotificationStatus::class,
    ];
}
