<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AddressControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('GET', '/parse-addresses', []);

        $response
        ->assertStatus(200)
        ->assertJson([
            'duplicates' => true,
            'non-duplicates' => true
        ]);
    }
}
