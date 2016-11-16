<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(['name' => 'Amazonas']);
        DB::table('cities')->insert(['name' => 'Anzoategui']);
        DB::table('cities')->insert(['name' => 'Apure']);
        DB::table('cities')->insert(['name' => 'Aragua']);
        DB::table('cities')->insert(['name' => 'Barinas']);
        DB::table('cities')->insert(['name' => 'Bolívar']);
        DB::table('cities')->insert(['name' => 'Carabobo']);
        DB::table('cities')->insert(['name' => 'Cojedes']);
        DB::table('cities')->insert(['name' => 'Delta amacuro']);
        DB::table('cities')->insert(['name' => 'Distrito capital']);
        DB::table('cities')->insert(['name' => 'Falcón']);
        DB::table('cities')->insert(['name' => 'Guárico']);
        DB::table('cities')->insert(['name' => 'Lara']);
        DB::table('cities')->insert(['name' => 'Miranda']);
        DB::table('cities')->insert(['name' => 'Monagas']);
        DB::table('cities')->insert(['name' => 'Mérida']);
        DB::table('cities')->insert(['name' => 'Nueva Esparta']);
        DB::table('cities')->insert(['name' => 'Portuguesa']);
        DB::table('cities')->insert(['name' => 'Sucre']);
        DB::table('cities')->insert(['name' => 'Trujillo']);
        DB::table('cities')->insert(['name' => 'Táchira']);
        DB::table('cities')->insert(['name' => 'Vargas']);
        DB::table('cities')->insert(['name' => 'Yaracuy']);
        DB::table('cities')->insert(['name' => 'Zulia']);
    }
}
