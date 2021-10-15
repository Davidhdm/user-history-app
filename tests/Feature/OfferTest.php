<?php

namespace Tests\Feature;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OfferTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_user_can_see_all_offers()
  {
    $offers = Offer::factory(2)->create();
    $user = User::factory()->create();

    $this->actingAs($user);
    $response = $this->get(route('home'));

    $response->assertStatus(200)
      ->assertSee($offers[0]->title)
      ->assertSee($offers[0]->img)
      ->assertSee($offers[0]->description)
      ->assertSee($offers[1]->title)
      ->assertSee($offers[1]->img)
      ->assertSee($offers[1]->description);
  }
}
