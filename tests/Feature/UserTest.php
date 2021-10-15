<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_guest_redirected_to_login_from_home()
  {
    $response = $this->get(route('home'));

    $response->assertStatus(302)
      ->assertRedirect('login');
  }
}
