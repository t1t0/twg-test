<?php

namespace Database\Factories;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PublicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        $user = $this->faker->randomElement($array = $users);
        return [
            'user_id' => $user->id,
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
