<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AmvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rand = rand(1,2);
        $string = "thumbnail";
        $stringend = ".png";
        $amv1 = "amv1.mp4";
        return [
            'title' => $this->faker->sentence(),
            'desc' => $this->faker->sentence(),
            'view' => 0,
            'like' => 0,
            'dislike' => 0,
            'category_id' => rand(1,5),
            'user_id' => rand(1,5),
            'video' => $amv1,
            'thumb' => $string.$rand.$stringend,
        ];
    }
}
