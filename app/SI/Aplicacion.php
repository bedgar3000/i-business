<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_maestro_aplicaciones';
    
    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_aplicacion';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener los parámetros asociados a la aplicación.
     */
    public function parametros()
    {
        return $this->hasMany('App\SI\Parametro', 'id_aplicacion', 'id_aplicacion');
    }

    /**
     * Obtener los misceláneos asociados a la aplicación.
     */
    public function miscelaneos()
    {
        return $this->hasMany('App\SI\Miscelaneo', 'id_miscelaneo', 'id_miscelaneo');
    }
}
