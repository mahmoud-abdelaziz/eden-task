<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record = DB::query()->from("oauth_clients")->find("9717e223-6f4b-4b34-9da9-ec244f630dda");
        if (!$record)
            DB::query()->from("oauth_clients")->insert([
                "id" => "9717e223-6f4b-4b34-9da9-ec244f630dda",
                "name" => "Eden API",
                "secret" => "9717e223-6f4b-4b34-9da9-ec244f630dda",
                "provider" => "users",
                "redirect" => url("/"),
                "personal_access_client" => 0,
                "password_client" => 1,
                "revoked" => 0,
            ]);
    }
}
