<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic database and posts test.
     *
     * @return void
     */
    public function testPostsTest()
    {

        // Create two posts
        $first = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()
        ]);
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        // Get the archives
        $posts = Post::archives();

        // Count it
        $this->assertCount(2, $posts);

        // Check the records
        $this->assertEquals(
            [
                [
                    "year" => $first->created_at->format('Y'),
                    "month" => $first->created_at->format('F'),
                    "published" => 1,
                ],
                [
                    "year" => $second->created_at->format('Y'),
                    "month" => $second->created_at->format('F'),
                    "published" => 1,
                ],
            ], $posts);
    }
}