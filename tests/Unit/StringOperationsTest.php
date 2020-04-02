<?php

namespace Tests\Unit;

use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class StringOperationsTest extends TestCase
{
    /** @test */
    public function it_creates_a_salutation()
    {
        $result = Str::of('hello')
            ->ucfirst()
            ->append(' my friend.');

        $this->assertEquals('Hello my friend.', $result);
    }

    /** @test */
    public function it_replaces_all_occurrences()
    {
        $result = Str::of('This is what separates good tea from other tea.')
            ->replace('tea', 'coffee');

        $this->assertEquals(
            'This is what separates good coffee from other coffee.',
            $result
        );
    }

    /** @test */
    public function it_extracts_filename()
    {
        $file = 'my_new.image-file.png';

        $result = Str::of($file)
            ->beforeLast('.');

        $this->assertEquals('my_new.image-file', $result);
    }

    /** @test */
    public function it_extracts_extension()
    {
        $file = 'my_new.image-file.png';

        $result = Str::of($file)
            ->afterLast('.');

        $this->assertEquals('png', $result);
    }

    /** @test */
    public function it_changes_a_file_extension()
    {
        $result = Str::of('my_new.image-file.png')
            ->beforeLast('.')
            ->append('.jpg');

        $this->assertEquals('my_new.image-file.jpg', $result);
    }

    /** @test */
    public function it_starts_with_another_string()
    {
        $result = Str::of('Where does it begin?')
            ->startsWith('Whiskey');

        $this->assertFalse($result);
    }

    /** @test */
    public function it_abbreviates_a_name()
    {
        $result = Str::of('John')
            ->limit(1, '.');

        $this->assertEquals('J.', $result);
    }

    /** @test */
    public function it_changes_a_filename()
    {
        $result = Str::of('NewFile')
            ->prepend('app')
            ->kebab()
            ->finish('.css');

        $this->assertEquals('app-new-file.css', $result);
    }

    /** @test */
    public function it_gets_value_between_strings()
    {
        $result = Str::of('They drink coffee')->between('They ', ' coffee');

        $this->assertEquals('drink', $result);
    }

    /** @test */
    public function it_extracts_class_and_method()
    {
        $result = Str::of('UserController@show')->parseCallback();

        $this->assertEquals(['UserController', 'show'], $result);
    }

    /** @test */
    public function it_pluralizes_a_studly_case_string()
    {
        $result = Str::of('MyApplication')->pluralStudly();

        $this->assertEquals('MyApplications', $result);
    }

    /** @test */
    public function it_creates_a_random_string()
    {
        $result = Str::random(16);

        $this->assertIsString($result);
        $this->assertEquals(16, Str::of($result)->length());
    }

    /** @test */
    public function it_converts_to_title_case()
    {
        $result = Str::of('what is this article about?')->title();

        $this->assertEquals('What Is This Article About?', $result);
    }
}
