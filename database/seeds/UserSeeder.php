<?php

use Illuminate\Database\Seeder;
use \App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre_usuario' => 'Admin',
            'apellido_paterno' => 'Admin',
            'email' => 'admin@umss.edu.bo',
            'contrasenia' => bcrypt('123456'),
        ]);
    }
}
