<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\Participant;

class TrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $participants = Participant::where(
            'event_uid',
            '10c45eb5-7eed-4b9b-9bfd-de1eb8ab90d7'
        )->get();
        $i = 0;
        foreach($participants as $participant) {
            // delete all participant with created_at > 2023-01-16 18:49:02
            if($participant->created_at > date('2023-01-16 18:49:02')) {
                $participant->delete();
                $i++;
            }
        }
        // dd(count(Participant::where('created_at', '>', date('2023-01-16 18:49:02'))->get()));
        // dd(date('2023-01-16 18:49:02'));
        dd($i);
    }
}
