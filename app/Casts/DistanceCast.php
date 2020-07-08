<?php

namespace App\Casts;

use App\ValueObjects\DistanceFromEarth;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class DistanceCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return new DistanceFromEarth(
            $attributes['measurement'],
            $attributes['unit']
        );
    }

    public function set($model, $key, $value, $attributes)
    {
        if (!$value instanceof DistanceFromEarth) {
            throw new InvalidArgumentException('The given value is not a DistanceFromEarth instance.');
        }

        return [
            'measurement' => $value->showMeasurement(),
            'unit' => $value->showUnit(),
        ];
    }
}
