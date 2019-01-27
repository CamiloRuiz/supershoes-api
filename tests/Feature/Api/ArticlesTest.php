<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesTest extends TestCase
{
    /**
     * Test get articles list
     *
     * @return void
     */
    public function testGetArticlesList()
    {
        $base64 = base64_encode("my_user:my_password");
        $response = $this->json('GET', '/services/articles', [], ['Authorization' => 'Basic ' . $base64]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'articles' => [
                '*' => [
                    'id',
                    'description',
                    'name',
                    'price',
                    'total_in_shelf',
                    'total_in_vault',
                    'store_name',
                ]
            ],
            'success',
            'total_elements'
        ]);
    }
}
