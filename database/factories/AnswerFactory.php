<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    public function definition()
    {
        return [
            // Currently hard coded to 10 but it makes sense to generate questions and use its id
            'question_id' =>10,
            'content' => $this->faker->paragraph,
        ];
    }
}
