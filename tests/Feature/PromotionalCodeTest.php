<?php

namespace Tests\Feature;

use App\Models\PromotionalCode;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PromotionalCodeTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_user_can_see_owned_codes()
  {
    $user = User::factory()->create();
    $promotionalCodes = PromotionalCode::factory(2)->create([
      'user_id' => 1
    ]);

    $this->actingAs($user);
    $response = $this->get(route('promotional_codes'));

    $response->assertStatus(200)
      ->assertSee($promotionalCodes[0]->code)
      ->assertSee($promotionalCodes[1]->code);
  }

  public function test_user_cant_see_other_users_codes()
  {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $promotionalCode = PromotionalCode::factory()->create([
      'user_id' => 2
    ]);

    $this->actingAs($user1);
    $response = $this->get(route('promotional_codes'));

    $response->assertStatus(200)
      ->assertDontSee($promotionalCode->code);
  }
  
  public function test_user_can_get_code()
  {
    $user = User::factory()->create();

    $this->actingAs($user);
    $this->get(route('get_the_code'));
    $this->get(route('get_the_code'));
    
    $codeCount = $user->promotional_codes;
    $this->assertCount(2, $codeCount);
  }
  
  public function test_user_can_claim_owned_codes()
  {
    $user = User::factory()->create();
    PromotionalCode::factory(2)->create([
      'claimed' => false
    ]);

    $this->actingAs($user);
    $this->get(route('claim_code', ['id' => 2]));

    $code1 = $user->promotional_codes[0];
    $code2 = $user->promotional_codes[1];

    $this->assertEquals(0, $code1->claimed);
    $this->assertEquals(1, $code2->claimed);
  }
}
