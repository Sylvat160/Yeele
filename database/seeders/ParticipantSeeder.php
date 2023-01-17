<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $participants = [];
        $participants = Participant::where(
            'event_uid',
            '034657e5-feb3-421e-9bbc-3781e184888e'
        )->get();
        foreach ($participants as $participant) {
           if(gettype(json_decode($participant->additional_data)) == 'string'){
                if($participant->price > 10000) {
                    $niveau = 'MANAGER ET PLUS';
                }
                else {
                    $niveau = 'ANIMATEUR (TRICE) ADJOINT (E)';
                }
                $additional_data = [
                    "Numro-FBO" => "",
                    "Niveau" => $niveau,
                    'Pays-de-rsidence' => json_decode($participant->additional_data),
                ];
                $participant->additional_data = json_encode($additional_data);
                $participant->save();
           }

           if (count(json_decode($participant->additional_data, true)) == 1) {
                if ($participant->price > 10000) {
                    $niveau = 'MANAGER ET PLUS';
                } else {
                    $niveau = 'ANIMATEUR (TRICE) ADJOINT (E)';
                }
                $additional_data = [
                    'Numro-FBO' => '',
                    'Niveau' => $niveau,
                    'Pays-de-rsidence' => json_decode(
                        $participant->additional_data,
                        true
                    )['pays'],
                ];
                $participant->additional_data = json_encode($additional_data);
                $participant->save();
            }
        }


        // dd(
        //     count(json_decode(Participant::where(
        //         'email',
        //         'yeele-event103030.129193314@gmail.com'
        //     )->first()->additional_data, true))
        // );
        // create participant base on the array
        // foreach ($participants as $participant) {
        //     $additional_data = [
        //         'pays' => $participant['pays'],
        //     ];
        //     Participant::create([
        //         'lastname' => $participant['nom'],
        //         'firstname' => ' ',
        //         'phone' => (int) $participant['phone'],
        //         'email' => $participant['email'],
        //         'price' => (int) $participant['tarif'],
        //         'civility' => $participant['civilite'],
        //         'event_uid' => '10c45eb5-7eed-4b9b-9bfd-de1eb8ab90d7',
        //         'payment_method' => 'Sur place',
        //         'additional_data' => json_encode($additional_data),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }
    }
}
