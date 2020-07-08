<?php

namespace App\ValueObjects;

use Assert\Assert;

final class DistanceFromEarth
{
    private int $measurement;
    private string $unit;

    public function __construct(int $measurement, string $unit)
    {
        Assert::that($measurement)->greaterThan(0);
        Assert::that($unit)->inArray(['KM', 'MI', 'AU', 'LY']);

        $this->measurement = $measurement;
        $this->unit = $unit;
    }

    public function showMeasurement(): int
    {
        return $this->measurement;
    }

    public function showUnit(): string
    {
        return $this->unit;
    }
}
