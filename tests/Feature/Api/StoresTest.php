<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoresTest extends TestCase
{
    /**
     * Test fetches all stores
     *
     * @return void
     */
    public function testFetchesAllStores()
    {
        $response = $this->json('GET', '/services/stores', [], $this->basicAuthHeader());
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
