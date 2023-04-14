<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DepartmentGallery>
 */
class DepartmentGalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dept_id' => $this->faker->numberBetween(1, 12),
            'img' => $this->faker->imageUrl(1024, 600)
        ];
    }
}
