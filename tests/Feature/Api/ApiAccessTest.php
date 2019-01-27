<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiAccessTest extends TestCase
{
    /**
     * Test bad request
     *
     * @return void
     */
    public function testBadRequest()
    {
        $base64 = base64_encode("my_user:my_password");
        $response = $this->json('GET', '/services/stores/not_int/articles', [], ['Authorization' => 'Basic ' . $base64]);
        $response->assertStatus(400);
        $response->assertJson([
            'success' => false,
            'error_code' => 400,
            'error_msg' => 'Bad request'
        ]);
    }

    /**
     * Test not authorized request
     *
     * @return void
     */
    public function testNotAuthorizedRequest()
    {
        $response = $this->json('GET', '/services/stores');
        $response->assertStatus(401);
        $response->assertJson([
            'success' => false,
            'error_code' => 401,
            'error_msg' => 'Not authorized'
        ]);
    }
}
