<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Miscelaneo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_maestro_miscelaneos';
    
    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_miscelaneo';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;
    const CREATED_AT = 'ult_fecha';
    const UPDATED_AT = 'ult_fecha';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'ult_usuario', 'ult_fecha', 'ult_equipo', 'ult_ip'
    ];

    /**
     * Obtener la aplicacion a la que pertenece el maestro.
     */
    public function aplicacion()
    {
        return $this->hasOne('App\SI\Aplicacion', 'id_aplicacion', 'id_aplicacion');
    }

    /**
     * Obtener los valores asociados al maestro.
     */
    public function detalles()
    {
        return $this->hasMany('App\SI\MiscelaneoDetalle', 'id_miscelaneo', 'id_miscelaneo');
    }
}
