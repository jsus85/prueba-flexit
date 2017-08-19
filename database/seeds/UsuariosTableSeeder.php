<?php

use Illuminate\Database\Seeder;
use App\Usuarios;
class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuarios::create([
                'name' => 'Juan',
                'email' => 'juan@gmail.com',
                'password' => bcrypt('123')
            ]);

         Usuarios::create([
                'name' => 'Anita',
                'email' => 'anita@gmail.com',
                'password' => bcrypt('123')
            ]);
            // Client
          Usuarios::create([
                'name' => 'Maria',
                'email' => 'maria@gmail.com',
                'password' => bcrypt('123')
            ]);
    }
}
