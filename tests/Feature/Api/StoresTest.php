<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoresTest extends TestCase
{
    /**
     * Test get stores list
     *
     * @return void
     */
    public function testGetStoresList()
    {
        $base64 = base64_encode("my_user:my_password");
        $response = $this->json('GET', '/services/stores', [], ['Authorization' => 'Basic ' . $base64]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'stores' => [
                '*' => [
                    'id',
                    'address',
                    'name'
                ]
            ],
            'success',
            'total_elements'
        ]);
    }
}
