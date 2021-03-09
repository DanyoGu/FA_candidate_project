<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class AddressControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('GET', 'api/parse-addresses');
        $response
        ->assertStatus(200)
        ->assertEquals([
            count($response["duplicates"], 0)
        ]);
    }
}
