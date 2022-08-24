<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function runSetup()
    {
        $this->artisan("migrate", [
            "--refresh" => true
        ]);
        $this->artisan("seed:run");
    }
}
