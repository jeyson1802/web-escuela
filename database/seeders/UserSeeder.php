<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $user =  User::create([
        'name'=>"Claudio Campos",
        'email'=>"contato@sigasmart.com.br",
        'password'=>bcrypt('password')
    ]);
    $user->assignRole('Admin');
    User::factory(99)->create();
    }
}
