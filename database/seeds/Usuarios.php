<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "administrador";
        $user->email = "administrador@admin.com";
        $user->password = "123456";
        $user->estatus = 1;
        $user->rut = '11111111-1';
        $user->telefono = '';
        $user->direccion = '';
        $user->region_id = 1;
        $user->tipo = 1;
        $user->save();
        factory(App\User::class, 30)->create();

    }

}
