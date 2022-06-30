<?php

namespace Database\Factories;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{

    protected $model = Participant::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'event_uid' => "4736b290-8bca-44b7-beb3-aab10c353475",
        'firstname' => $this->faker->firstName("man"),
        'lastname' => $this->faker->lastName(),
        'email' => $this->faker->email(),
        'phone' => $this->faker->numberBetween(50000000, 78888888),
        'civility' => "Monsieur",
        ];
    }
}
