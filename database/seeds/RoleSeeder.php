<?php

use Illuminate\Database\Seeder;
use \App\Role;
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
        Role::create([
            'name'=> 'admin',
            'display_name'=> 'Administrador',
            'description'=> 'Usuario Administrador',
        ]);
        Role::create([
            'name'=> 'guest',
            'display_name'=> 'Invitado',
            'description'=> 'Usuario Invitado',
        ]);
    }
}
