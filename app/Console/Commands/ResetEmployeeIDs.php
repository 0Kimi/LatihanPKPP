<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetEmployeeIDs extends Command
{
    protected $signature = 'employees:reset-ids';
    protected $description = 'Reset the IDs of employees after deletion';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Step 1: Copy the data to the backup table
        DB::statement('INSERT INTO backup_employees (name, department_id, created_at, updated_at) SELECT name, department_id, created_at, updated_at FROM employees');

        // Step 2: Truncate the original table to reset the auto-increment
        DB::statement('TRUNCATE TABLE employees');

        // Step 3: Copy the data back from the backup table to the original table
        DB::statement('INSERT INTO employees (name, department_id, created_at, updated_at) SELECT name, department_id, created_at, updated_at FROM backup_employees');

        // Step 4: Drop the backup table
        DB::statement('DROP TABLE backup_employees');

        $this->info('Employee IDs have been reset successfully.');
    }
}