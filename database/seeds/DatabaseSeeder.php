<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(EntidadesAtributos::class);
        $this->call(Regiones::class);
        $this->call(CargaCsv::class);
        $this->call(Usuarios::class);
    }
}
