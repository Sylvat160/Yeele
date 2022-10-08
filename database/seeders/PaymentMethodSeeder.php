<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (
            [
                "Sur place",
                "Mobile Money",
                "Virement bancaire",
                "Carte bancaire",
                "Transfert Western Union",
                "Transfert Kia",
                "Tansfert MoneyGram"
            ]
             as $method
             ) {
            \App\Models\PaymentMethod::create(['name' => $method]);
        }
    }
}
