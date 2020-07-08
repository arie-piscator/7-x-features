<?php

namespace App;

use App\Casts\DistanceCast;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'measurement',
        'unit',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'distance' => DistanceCast::class,
    ];
}
