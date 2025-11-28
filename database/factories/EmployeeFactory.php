<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{

    //https://fakerphp.org/formatters/

    protected $model= Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname'=>fake()->name(),
             'first_name'=>fake()->firstName(),
            'last_name'=>fake()->lastName(),
            'email'=>fake()->safeEmail(),
            'address'=>fake()->address(),
            'telephone'=>fake()->phoneNumber(),
            'notes'=> fake()->sentence(),
            'salary'=>fake()->randomNumber()
        ];
    }
}
