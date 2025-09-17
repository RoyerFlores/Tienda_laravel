<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\HasDatabaseNotifications;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'celular',
        'email',
        'direccion'
    ];

}