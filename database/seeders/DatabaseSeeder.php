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
    }
}
