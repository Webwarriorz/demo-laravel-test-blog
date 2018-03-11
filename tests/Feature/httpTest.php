<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class httpTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStatusTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic logo example.
     *
     * @return void
     */
    public function testHttpTest()
    {
        $response = $this->get('/posts')->assertSee('Little secret blog');
    }
}
