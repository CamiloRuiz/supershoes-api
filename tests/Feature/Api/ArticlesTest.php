<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesTest extends TestCase
{
    /**
     * Test fetches all articles
     *
     * @return void
     */
    public function testFetchesAllArticles()
    {
        $response = $this->json('GET', '/services/articles', [], $this->basicAuthHeader());
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

    /**
     * Test fetches all articles
     *
     * @return void
     */
    public function testFetchesAllArticlesByStore()
    {
        $response = $this->json('GET', '/services/stores/5/articles', [], $this->basicAuthHeader());
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
