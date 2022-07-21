<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(['name'=>'Administrador','description'=>'Role administrador de la plataforma INVITRO']);
        Role::create(['name'=>'Comprador','description'=>'Role comprador de la plataforma INVITRO']);
    }
}
