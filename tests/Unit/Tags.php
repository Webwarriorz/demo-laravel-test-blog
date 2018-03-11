<?php

namespace Tests\Unit;

use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagsTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic database and tags test.
     *
     * @return void
     */
    public function testTagsTest()
    {

        // Create two tags
        $firstTag = factory(Tag::class,20)->create();

        // Get the archives
        $tags = Tag::all();

        // Count it
        $this->assertCount(20,$tags);

    }
}