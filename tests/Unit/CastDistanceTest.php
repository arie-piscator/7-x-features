<?php

namespace Tests\Unit;

use App\ValueObjects\DistanceFromEarth;
use Assert\InvalidArgumentException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Planet;

class CastDistanceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_a_distance_object()
    {
        $planet = new Planet();

        $planet->name = 'Mars';
        $planet->distance = new DistanceFromEarth(
            225000000,
            'KM'
        );

        $planet->save();

        $this->assertDatabaseHas('planets', [
            'name' => 'Mars',
            'measurement' => 225000000,
            'unit' => 'KM',
        ]);
    }

    /** @test */
    public function it_returns_a_distance_object()
    {
        $planet = new Planet();

        $planet->name = 'Mars';
        $planet->distance = new DistanceFromEarth(
            225000000,
            'KM'
        );

        $this->assertEquals(new DistanceFromEarth(225000000, 'KM'), $planet->distance);
    }

    /** @test */
    public function it_validates_the_distance()
    {
        $this->expectException(InvalidArgumentException::class);

        $planet = new Planet();

        $planet->name = 'Mars';
        $planet->distance = new DistanceFromEarth(
            225000000,
            'METERS'
        );
    }
}
