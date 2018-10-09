<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_maestro_municipios';
    protected $fillable = ['desc_municipio'];

    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_municipio';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener el el estado al que pertenece el municipio.
     */
    public function estado()
    {
        //return $this->hasOne('App\SI\Estado', 'id_estado', 'id_estado');
        return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
    }


}
