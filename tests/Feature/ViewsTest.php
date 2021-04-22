<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laracasts\Integrated\Extensions\Laravel;
use App\User;

class ViewsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexShowViews()
    {
        /**
         * Index page view
         */
        $response = $this->get(route('index'));

        $response->assertStatus(200);
        $response->assertViewIs('welcome');


        /**
         * Redirect unregistered user trying to see his/her own profile
         */
        $response = $this->get(route('profile'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));

        /**
         * Show other user's profile
         */
        $response = $this->get(route('profile.topics', 2));

        $response->assertStatus(200);
        $response->assertViewIs('user.activity');

        /**
         * See profile edit
         */
        $response = $this->get(route('profile.edit'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));

        /**
         * See password edit
         */
        $response = $this->get(route('profile.password.edit'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));

        /**
         * Show user's posts
         */
        $response = $this->get(route('profile.posts', 2));

        $response->assertStatus(200);
        $response->assertViewIs('user.activity');

        /**
         * Show FAQ page
         */
        $response = $this->get(route('faq'));

        $response->assertStatus(200);
        $response->assertViewIs('faq');

        /**
         * Show search results page
         */
        $response = $this->get(route('search'));

        $response->assertStatus(200);
        $response->assertViewIs('search');

        /**
         * See topic
         */
        $response = $this->get(route('topic', 1));

        $response->assertStatus(200);
        $response->assertViewIs('topic.index');

        /**
         * See create topic
         */
        $response = $this->get(route('topic.create'));

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));

        /**
         * Tests for logged in user
         */
        $user = User::find(2);
        $this->be($user);

        /**
         * See own profile page
         */
        $response = $this->get(route('profile'));

        $response->assertStatus(200);
        $response->assertViewIs('user.index');

        /**
         * See profile edit
         */
        $response = $this->get(route('profile.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('user.edit');

        /**
         * See password edit
         */
        $response = $this->get(route('profile.password.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('user.password.edit');

        /**
         * See create topic
         */
        $response = $this->get(route('topic.create'));

        $response->assertStatus(200);
        $response->assertViewIs('topic.create');
    }
}
