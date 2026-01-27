<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacaoLog extends Model
{
    protected $table = 'notificacao_logs';
    protected $fillable = [
        'notificacao_id',
        'status',
        'mensagem'
    ];

    public function notificacao()
    {
        return $this->belongsTo(Notificacao::class);
    }
}
