<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobData>
 */
class JobDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title'=>fake()->word(),
        'image'=>basename(fake()->image(public_path('assets/img'))),
        'description'=>fake()->text(),
        'responsability'=>fake()->text(),
        'job_nature'=>fake()->randomElement(['part time','full time']),
        'location'=>fake()->address(),
        'salary_from'=>fake()->numberBetween(100,500),
        'salary_to'=>fake()->numberBetween(600,2500),
        'qualification'=>fake()->text(),
        'date_line'=>fake()->date(),
        'published'=>fake()->boolean(),
        'category_id'=>fake()->numberBetween(1,5),
        'company_id'=>fake()->numberBetween(1,5),
        ];
    }
}
