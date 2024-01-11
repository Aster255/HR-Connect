<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        $position = Position::inRandomOrder()->first();
        $department = Department::inRandomOrder()->first();

        return [
            'position_id' => $position->position_id,
            'department_id' => $department->department_id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'hire_date' => $this->faker->date(),
            'salary' => $this->faker->numberBetween(5000, 100000),
            'middle_name' => $this->faker->optional()->firstName,
            'maiden_name' => $this->faker->optional()->lastName,
            'nick_name' => $this->faker->optional()->userName,
        ];
    }
}
