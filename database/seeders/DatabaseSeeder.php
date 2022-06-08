<?php

namespace Database\Seeders;

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
        foreach (["Admin", "Client"] as $role) {
            \App\Models\Role::create(['name' => $role]);
        }
        foreach (
            [
                "Free" => 0, 
                "Silver" => 15000, 
                "Gold" => 50000
                ]
            as $name => $price
             ) {
                \App\Models\Plan::create([
                    'name' => $name,
                    'price' => $price
                ]);
        }

        foreach (["Congrès", "Formation"] as $category) {
            \App\Models\Category::create(['name' => $category]);
        }

        $this->call([
            UserSeeder::class
        ]);
    }
}
