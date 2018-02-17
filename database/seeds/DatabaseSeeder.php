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
        $this->call([

        	empresaSeeder::class,
        	usuarioSeeder::class,
        	sucursalSeeder::class,
        	inv_sucursalSeeder::class,
        	facturaSeeder::class,
        	tipo_productoSeeder::class,
        	inventarioSeeder::class,
        	productoSeeder::class,
        	detalle_facturaSeeder::class
        ]);
    }
}
