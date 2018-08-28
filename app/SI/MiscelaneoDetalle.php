<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class MiscelaneoDetalle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_miscelaneos_det';
    
    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_miscelaneo_det';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener el tipo de moneda origen a la que pertenece el tipo de cambio.
     */
    public function miscelaneo()
    {
        return $this->hasOne('App\SI\Miscelaneo', 'id_miscelaneo', 'id_miscelaneo');
    }
}
