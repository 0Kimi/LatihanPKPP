<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegistersTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $data[] = [
                'tmula' => now()->addDays($i)->toDateString(),
                'takhir' => now()->addDays($i + 1)->toDateString(),
                'nama' => 'Kursus ' . Str::random(10),
                'kategori' => ['PI', 'SM', 'LL'][array_rand(['PI', 'SM', 'LL'])],
                'anjuran' => ['INT', 'EXT'][array_rand(['INT', 'EXT'])],
                'penganjur' => rand(0, 1) ? 'Penganjur ' . Str::random(5) : null,
                'tempoh' => rand(8, 40),
                'lokasi' => 'Lokasi ' . $i,
                'ykos' => rand(100, 1000),
                'pkos' => rand(50, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // \DB::table('registers')->insert($data);
    }
}
