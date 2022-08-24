<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::query()->where([
            "email" => "user@email.com",
        ])->exists()) {
            User::factory()->create([
                "name" => "User",
                "email" => "user@email.com",
                "password" => bcrypt("user@123"),
                "role" => "Admin",
            ]);
        }
//        (new User([
//            "name" => "User",
//            "email" => "user@email.com",
//            "password" => "user@123"
//        ]))->save();
    }
}
