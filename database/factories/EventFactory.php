<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_name' => $this->faker->sentence(3),
            'no_whatsapp' => $this->faker->numerify('08########'),
            'description' => $this->faker->paragraph,
            'date' => $this->faker->date,
            'deadline' => $this->faker->date,
            'location' => $this->faker->address,
            'image' => $this->faker->imageUrl,
            'status' => $this->faker->randomElement(['upcoming', 'completed']),
        ];
    }
}
