<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic database and user test.
     *
     * @return void
     */
    public function testUserTest()
    {

        // Create 50 users
        $createUsers = factory(User::class, 50)->create();

        // Get all users
        $users = User::all();

        // Count it
        $this->assertCount(50, $users);

    }
}