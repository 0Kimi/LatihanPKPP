<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => 'Syed',
                'department_id' => 1, // Correct column name
                'department_name' => 'Human Resources', // Include department name if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more employees as needed
        ]);
    }
}