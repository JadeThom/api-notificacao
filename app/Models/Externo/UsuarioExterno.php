<?php

namespace App\Models\Externo;

use Illuminate\Database\Eloquent\Model;

class UsuarioExterno extends Model
{
    protected $connection = 'external_pgsql';
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
