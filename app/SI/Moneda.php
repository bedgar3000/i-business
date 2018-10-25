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
     * Obtener los tipos de cambios que tiene la moneda.
     */
    public function tipo_cambio_origen()
    {
        return $this->hasMany('App\SI\TipoCambio', 'id_moneda', 'id_moneda_origen');
    }

    /**
     * Obtener los tipos de cambios que tiene la moneda.
     */
    public function tipo_cambio_destino()
    {
        return $this->hasMany('App\SI\TipoCambio', 'id_moneda', 'id_moneda_destino');
    }
}
