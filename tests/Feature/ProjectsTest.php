<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_logged_in_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        // Create a user and log him in.
        $user = factory('App\User')->create();
        $this->actingAs($user);

        $attributes = factory('App\Project')->raw();

        // change the user id from the id created by the factory
        // to the logged in user id
        $attributes['owner_id'] = $user->id;

        $this->post('/projects', $attributes)->assertRedirect('projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('projects')->assertSee($attributes['title']);
    }

    public function test_a_project_require_a_title()
    {
        // create
        // will create the necessary attributes and save it to the DB.
        // make
        // will create the necessary attributes and that's it.
        // raw
        // will create the necessary attributes and return them as an array.

        // Create a user and log him in.
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    public function test_a_project_require_a_description()
    {

        // Create a user and log him in.
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    public function test_a_user_can_view_a_project()
    {

        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $project = factory('App\Project')->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    public function test_only_authenticated_users_can_create_a_project()
    {
        // $this->withoutExceptionHandling();
        $attributes = factory('App\Project')->raw();


        $this->post('/projects', $attributes)->assertRedirect('login');
    }
}
