<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create employees and related records
        $employees = \App\Models\Employee::factory(50)->create();

        foreach ($employees as $employee) {
            // Create EmployeeInformation
            \App\Models\EmployeeInformation::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);

            // Create EmployeeNotify
            \App\Models\EmployeeNotify::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);

            // Create EmployeeDoc
            \App\Models\EmployeeDoc::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);
        }
    }
}
