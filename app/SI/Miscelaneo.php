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
    public $timestamps = false;

    /**
     * Obtener la aplicacion a la qe pertenece maestro.
     */
    public function aplicacion()
    {
        return $this->hasOne('App\SI\Aplicacion', 'id_aplicacion', 'id_aplicacion');
    }
}
