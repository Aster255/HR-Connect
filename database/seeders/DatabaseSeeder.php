<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use App\Models\EmployeeInformation;
use App\Models\EmployeeNotify;
use App\Models\EmployeeDoc;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            
        // Create available Departments
            Department::factory()->create([
                'department_name' => 'Human Resource Developement',
                'department_status' => 'Added',
            ]);

        // Create available Positions
        Position::factory()->create([
            'department_id' => 1,
            'position_name' => 'Human Resource Associate',
        ]);
        
        // Create employees and related records
        $employees = Employee::factory(50)->create();

        foreach ($employees as $employee) {
            // Create EmployeeInformation
            EmployeeInformation::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);

            // Create EmployeeNotify
            EmployeeNotify::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);

            // Create EmployeeDoc
            EmployeeDoc::factory()->create([
                'employee_id' => $employee->employee_id,
            ]);
        }
    }
}
