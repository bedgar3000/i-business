<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_maestro_parametros';
    
    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_parametro';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener la aplicación a la que pertenece el parámetro.
     */
    public function aplicacion()
    {
        return $this->belongsTo('App\SI\Aplicacion', 'id_aplicacion', 'id_aplicacion');
    }
}
