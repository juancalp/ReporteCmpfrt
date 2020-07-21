<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class DisponibilidadDiaria extends Model
{
    //

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y');
    }

    protected $table = 'disponibilidad_diaria';

    protected $fillable = [
        'time_runnig','time_stopped','id_disponibilidad','created_at',
    ];
    
    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'fecha' => 'date:Y-m-d',
    ];

    protected $dates = [
        'fecha','created_at',
    ];

    public function getFechaAttribute($value)
    {
        return 'Carbon';
    }

}
