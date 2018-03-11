<?php

namespace Tests\Unit;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentsTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic database and comments test.
     *
     * @return void
     */
    public function testCommentsTest()
    {

        // Create a post
        $post = factory(Post::class)->create([
            'id' => 99
        ]);

        // Create a user
        $user = factory(User::class)->create([
            'id' => 99
        ]);

        // Create a comment
        $firstComment = factory(Comment::class)->create([
            "post_id" => 99,
            "user_id" => 99,
            "body" => 'Lorem ipsum',
        ]);

        // Get the latest comment
        $comment = Comment::find(1)->toArray();

        // Check the records
        $this->assertEquals(
            [
                "post_id" => $firstComment->post_id,
                "user_id" => $firstComment->user_id,
                "body" => $firstComment->body,
                "id" => 1,
                "created_at" => $firstComment->created_at,
                "updated_at" => $firstComment->updated_at,
            ], $comment);
    }
}