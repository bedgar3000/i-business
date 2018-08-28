<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class TipoCambio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_maestro_tipo_cambio';
    
    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_tipo_cambio';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener el tipo de moneda origen a la que pertenece el tipo de cambio.
     */
    public function moneda_origen()
    {
        return $this->hasOne('App\SI\Moneda', 'id_moneda', 'id_moneda_origen');
    }

    /**
     * Obtener el tipo de moneda destino a la que pertenece el tipo de cambio.
     */
    public function moneda_destino()
    {
        return $this->hasOne('App\SI\Moneda', 'id_moneda', 'id_moneda_destino');
    }
}
