<?php

namespace Database\Seeders;

use App\Models\Command;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'role_id' => 2,
            'firstname' => "Aboubakary",
            'lastname' => "Cissé",
            'gender' => "Masculin",
            'email' => "aboubakarycisse410@gmail.com",
            'phone' => 66292862,
            'organization' => "Selft",
            'is_authorized' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('aboubakary')
        ]);

        Command::create([
            'uid' => Str::uuid(),
            'user_uid' => $user->uid,
            'plan_id' => 1,
            'duration' => 4,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::create(2022, 8)
        ]);
    }
}
