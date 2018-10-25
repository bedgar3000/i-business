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
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'ult_usuario', 'ult_fecha', 'ult_equipo', 'ult_ip'
    ];

    /**
     * Obtener el maestro a la que pertenece el valor.
     */
    public function miscelaneo()
    {
        return $this->hasOne('App\SI\Miscelaneo', 'id_miscelaneo', 'id_miscelaneo');
    }
}
