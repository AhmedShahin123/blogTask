<?php

namespace Tests\Feature;

use App\Models\Config;
use Tests\TestCase;

class PageTest extends TestCase
{


    public function testLoginPage()
    {
        $this->get('admin/login')
            ->assertOk()
            ->assertSee('Welcome')
            ->assertSee('Login');
    }
}
