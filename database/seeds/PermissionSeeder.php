<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            [
                'display_name' => 'Modulo Usuarios',
                'name' => 'manage users',
                'description' => 'Acceso al modulo de usuario Profesionales admin auxiliar.',

            ], [
                'display_name' => 'Crear Usuario',
                'name' => 'create user',
                'description' => 'Crear Usuarios',
            ], [
                'display_name' => 'Crear Usuario Administrador',
                'name' => 'create admin',
                'description' => 'Crear usuario Administrador',
            ], [
                'display_name' => 'Crear Usuario Profesionales',
                'name' => 'create profesional',
                'description' => 'Crear Usuario Profesionales',
            ], [
                'display_name' => 'Crear Usuario Auxiliar',
                'name' => 'create auxiliar',
                'description' => 'Crear Usuario Auxiliar',
            ],
        ]);
    }
}
