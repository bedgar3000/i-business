<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_maestro_estados';
    protected $fillable = ['desc_estado'];

    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id_estado';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener el el pais al que pertenece el estado.
     */
    public function pais()
    {
        //return $this->hasOne('App\SI\Pais', 'id_pais', 'id_pais');
        return $this->belongsTo(Pais::class, 'id_pais', 'id_pais');
    }

    function municipio()
    {
        return $this->hasMany(Municipio::class,'id_estado', 'id_estado');
    }

    function ciudad()
    {
        return $this->hasMany(Ciudad::class,'id_estado', 'id_estado');
    }
}
