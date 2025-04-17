<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ParticipationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('participations')->insert([
            [
                'register_id' => 1,
                'department_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'register_id' => 2,
                'department_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'register_id' => 3,
                'department_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'register_id' => 4,
                'department_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}