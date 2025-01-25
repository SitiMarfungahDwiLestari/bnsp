<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    public function run()
{
    \App\Models\Agama::create(['nama' => 'Islam']);
    \App\Models\Agama::create(['nama' => 'Kristen Protestan']);
    \App\Models\Agama::create(['nama' => 'Katolik']);
    \App\Models\Agama::create(['nama' => 'Hindu']);
    \App\Models\Agama::create(['nama' => 'Buddha']);
}
}
