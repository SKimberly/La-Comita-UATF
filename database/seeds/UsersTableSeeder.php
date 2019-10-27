<?php

use Illuminate\Database\Seeder;
use Lacomita\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'fullname' => 'silvana marquina',
    		'cedula' => '12345678',
            'telefono' => '78630742',
    		'tipo' => 'SuperAdmin',
    		'email' => 'kimi_123@gmail.com',
    		'password' => bcrypt('secret')
    	]);

        User::create([
            'fullname' => 'Emilio Salas',
            'cedula' => '87654321',
            'telefono' => '70000000',
            'tipo' => 'Administrador',
            'email' => 'sport.lacomita19@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'fullname' => 'Juancito Pinto',
            'cedula' => '87654311',
            'telefono' => '70000011',
            'tipo' => 'Cliente',
            'email' => 'kimi.uatf@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
