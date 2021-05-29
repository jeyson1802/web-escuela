<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name'=>"Nível basico"
        ]);
        Level::create([
            'name'=>"Nível intermediário"
        ]);
        Level::create([
            'name'=>"Nível avançado"
        ]);
 
    }
}
