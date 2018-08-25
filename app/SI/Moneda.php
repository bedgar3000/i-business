<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_maestro_monedas';
    
    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_moneda';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener los parámetros asociados a la aplicación.
     */
    public function tipo_cambio_origen()
    {
        return $this->hasMany('App\SI\TipoMoneda', 'id_moneda', 'id_moneda_origen');
    }

    /**
     * Obtener los parámetros asociados a la aplicación.
     */
    public function tipo_cambio_destino()
    {
        return $this->hasMany('App\SI\TipoMoneda', 'id_moneda', 'id_moneda_destino');
    }
}
