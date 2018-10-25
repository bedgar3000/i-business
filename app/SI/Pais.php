<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
        /**
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'si_maestro_paises';
        protected $fillable = ['desc_pais'];

        /**
         * Primary Key.
         *
         * @var string
         */
        protected $primaryKey = 'id_pais';

        /**
         * Indicates if the model should be timestamped.
         *
         * @var bool
         */
        public $timestamps = false;

        /**
         * Obtener la aplicación a la que pertenece el parámetro.
         */
        public function estados()
        {
                return $this->hasMany(Estado::class,'id_pais', 'id_pais');
        }
}
