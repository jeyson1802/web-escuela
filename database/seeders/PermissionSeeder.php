<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'Criar Curso'
        ]);
        Permission::create([
            'name'=>'Ler Curso'
        ]);
        Permission::create([
            'name'=>'Editar Curso'
        ]);
        Permission::create([
            'name'=>'Apagar Curso'
        ]);
        
        Permission::create([
            'name'=>'Ver Dashboard'
        ]);
        
        Permission::create([
            'name'=>'Cadastar Role'
        ]);
        
        Permission::create([
            'name'=>'Editar Role'
        ]);
        
        Permission::create([
            'name'=>'Listar Role'
        ]);
        
        Permission::create([
            'name'=>'Apagar Role'
        ]);

        Permission::create([
            'name'=>'Ler Usuários'
        ]);
        
        Permission::create([
            'name'=>'Edita Usuários'
        ]);
    }
}
