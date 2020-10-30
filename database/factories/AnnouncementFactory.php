<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' =>  $this->faker->sentence($nbWords = 80, $variableNbWords = true),
            'price' => rand(0, 9999) / 10,
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            
        ];
    }
}
