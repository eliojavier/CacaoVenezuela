<?php

use Illuminate\Database\Seeder;

class CriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criteria = [
            ['phase' => 1, 'criterion' => 'Costo de los ingredientes'],
            ['phase' => 1, 'criterion' => 'Versatilidad'],
            ['phase' => 1, 'criterion' => 'Aprovechamiento de los ingredientes'],
            ['phase' => 1, 'criterion' => 'Creatividad/originalidad'],
            ['phase' => 1, 'criterion' => 'Calidad nutricional de los ingredientes'],
            ['phase' => 2, 'criterion' => 'Utilización del espacio físico'],
            ['phase' => 2, 'criterion' => 'Técnicas'],
            ['phase' => 2, 'criterion' => 'Higiene'],
            ['phase' => 2, 'criterion' => 'Presentación'],
            ['phase' => 2, 'criterion' => 'Tiempo de elaboración'],
        ];

        DB::table('criteria')->insert($criteria);
    }
}
