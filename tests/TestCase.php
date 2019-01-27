<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function basicAuthHeader() {
        $base64 = base64_encode("my_user:my_password");
        return [
            'Authorization' => 'Basic ' . $base64
        ];
    }
}
