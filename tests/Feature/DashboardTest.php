<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_authenticated_users_can_visit_the_dashboard()
    {
        $response = $this->get(route('dashboard'));
        $response->assertOk();
    }
}
