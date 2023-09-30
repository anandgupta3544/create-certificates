<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'certificate_number' => fake()->randomNumber(5, true),
            'event_name' => fake()->unique()->sentence(),
            'date_of_event' => fake()->date(),
            'organizer_name' => fake()->unique()->name(),
            'organizer_email' => fake()->unique()->safeEmail(),
            'website_url' => fake()->unique()->url(),
            'head_name' => fake()->unique()->name(),
            'mentor_name' => fake()->unique()->name(),
        ];
    }
}
