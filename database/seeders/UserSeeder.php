<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sucursal;
use App\Models\UserSucursal;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Sucursal::create([
         'codigo'  => '00001',
           'descripcion'  => 'Este',
           'email' => 'sucursal@este.com',
        ]);

        Sucursal::create([
           'codigo'  => '00002',
           'descripcion'  => 'Oeste',
           'email' => 'sucursal@oeste.com',
        ]);

        Sucursal::create([
           'codigo'  => '00003',
           'descripcion'  => 'Norte',
           'email' => 'sucursal@norte.com',
        ]);

        Sucursal::create([
           'codigo'  => '00004',
           'descripcion'  => 'Sur',
           'email' => 'sucursal@sur.com',
        ]);



        User::create([
	       'nombre'         => 'Administrador',
	       'email'          => 'admin@admin.com',
	       'password'       => bcrypt('secret'),
           'sucursal_id'    => 1,
        ]);

        UserSucursal::create([
           'user_id'        => 1,
           'sucursal_id'    => 1,
        ]);

    }
}
