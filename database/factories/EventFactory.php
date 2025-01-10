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
            'event_name' => $this->faker->word(3),
            'no_whatsapp' => $this->faker->numerify('08##########'),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['open', 'close']),
        ];
    }
}
