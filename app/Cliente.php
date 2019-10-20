<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Nos ayuda a manejar los datos en la tabla cliente
*/

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['documento_cliente', 'nombre_cliente', 'apellido_cliente', 'direccion_cliente', 'telefono_cliente', 'id_tipo_cliente'];
}
