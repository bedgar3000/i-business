<?php

namespace App\SI;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'si_mastusuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario','password','flag_vence','fecha_vence','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
