<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(20),
            'slug' => Str::slug($this->faker->realText(20)),
            'thumb' => $this->faker->imageUrl(700, 350),
            'status' => '1',
            'meta_title' => $this->faker->realText(40),
            'meta_tag' => $this->faker->realText(20),
            'meta_desc' => $this->faker->text(100),
        ];
    }
}
