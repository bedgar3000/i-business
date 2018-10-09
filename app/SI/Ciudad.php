<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_maestro_ciudades';
    protected $fillable = ['desc_ciudad','cod_postal','ind_capital'];

    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_ciudad';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener el el estado al que pertenece el municipio.
     */
    public function ciudad()
    {
        //return $this->hasOne('App\SI\Estado', 'id_estado', 'id_estado');
        return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
    }


}
