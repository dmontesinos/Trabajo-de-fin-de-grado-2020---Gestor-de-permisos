<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Para añadir un nuevo usuario utilizamos el siguiente script, personalizando datos y lanzándolo desde consola.
        // Comando consola -> php artisan db:seed --class=UsersTableSeeder 
        DB::table('users')->insert([
            'name' => 'Daniel Montesinos',
            'email' => 'daniel.montesinos@e-campus.uab.cat',
            'password' => Hash::make('q1w2e3r4')
        ]);
    }
}
