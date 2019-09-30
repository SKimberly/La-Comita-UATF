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
    		'email' => 'kimi_123@gmail.com',
    		'password' => bcrypt('secret')
    	]);
    }
}
