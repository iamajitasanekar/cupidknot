<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'expected_income' => $this->faker->numerify('500000-5000000'),
            'multi_occupation' => $this->faker->randomElement($array = array(['private job', 'government job'],['private job', 'government job','business'],['government job','business'])),
            'multi_family_type' => $this->faker->randomElement($array = array(['joint family', 'nuclear family'],['joint family'], ['nuclear family'])),
            'multi_manglik' => $this->faker->randomElement($array = array(['yes','no'],['yes','no','both'])),
        ];
    }
}
