<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        User::factory()->create([
          'email' => 'user1@example.com'
        ]);
        User::factory()->create([
          'email' => 'user2@example.com'
        ]);

        Offer::factory(10)->create();
    }
}
