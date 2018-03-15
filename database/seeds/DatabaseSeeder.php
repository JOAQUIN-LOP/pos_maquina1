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
        $this->call(empresaSeeder::class);
        $this->call(usuarioSeeder::class);
        $this->call(sucursalSeeder::class);
        $this->call(tipo_productoSeeder::class);
        $this->call(productoSeeder::class);
        $this->call(detalle_productoSeeder::class);
        $this->call(facturaSeeder::class);
        $this->call(detalle_facturaSeeder::class);
        $this->call(inventarioSeeder::class);
        $this->call(detalle_inventarioSeeder::class);
        $this->call(inv_sucursalSeeder::class);
        $this->call(detalle_inventario_sucursalSeeder::class);

    }
}
