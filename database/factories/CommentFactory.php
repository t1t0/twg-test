<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Publication;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        $user = $this->faker->randomElement($array = $users);
        $publications = User::all();
        $publication = $this->faker->randomElement($array = $publications);
        return [
            'user_id' => $user->id,
            'publication_id' => $publication->id,
            'content' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'status' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
