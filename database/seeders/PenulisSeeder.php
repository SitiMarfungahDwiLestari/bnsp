<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenulisSeeder extends Seeder
{
    public function run()
    {
        DB::table('penulis')->insert([
            ['nama' => 'Andrea Hirata'],
            ['nama' => 'Tere Liye'],
            ['nama' => 'Pramoedya Ananta Toer']
        ]);
    }
}
