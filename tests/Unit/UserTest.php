<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function test_a_user_has_projects()
    {
        $user = factory('App\User')->create();

        self::assertInstanceOf(Collection::class, $user->projects);
    }
}
