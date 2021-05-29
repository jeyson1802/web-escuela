<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'PHP'
        ]);
        Category::create([
            'name'=>'Frameworks PHP'
        ]);
        Category::create([
            'name'=>'HTML'
        ]);
        Category::create([
            'name'=>'CSS'
        ]);
        Category::create([
            'name'=>'JavaScript'
        ]);
    }
}
