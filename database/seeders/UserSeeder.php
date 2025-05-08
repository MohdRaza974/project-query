<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/users.json');
        $result = collect(json_decode($json));

        $result->each(function ($result) {
            user::create([
                "name" => $result->name,
                "email" => $result->email,
                "age" => $result->age,
                "city" => $result->city
            ]);
        });

    }
}
