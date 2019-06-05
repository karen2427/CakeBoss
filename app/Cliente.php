<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['documento_cliente', 'nombre_cliente', 'apellido_cliente', 'direccion_cliente', 'telefono_cliente', 'id_tipo_cliente'];
}
