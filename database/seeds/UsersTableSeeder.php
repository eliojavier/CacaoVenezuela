<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Elio',
            'last_name' => 'Acosta',
            'email' => 'elioacosta@gmail.com',
            'doc_id' => '17146579',
            'password' => bcrypt(123456),
            'birthday' => DateTime::createFromFormat('d/m/Y', '29/01/1986')->format('Y-m-d'),
            'phone' => '0426-105-81-85',
            'twitter' => 'eliojavier',
            'instagram' => 'eliojavier',
            'size' => 'M',
            'category' => 'Estudiante/Profesional',
            'type' => 'N/A',
            'city_id' => 1,
            'academy_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Pedro',
            'last_name' => 'Pérez',
            'email' => 'pedroperez@gmail.com',
            'doc_id' => '15456789',
            'password' => bcrypt(123456),
            'birthday' => DateTime::createFromFormat('d/m/Y', '29/01/1986')->format('Y-m-d'),
            'phone' => '0412-159-78-45',
            'twitter' => 'pedroperez',
            'instagram' => 'pedroperez',
            'size' => 'M',
            'category' => 'Estudiante/Profesional',
            'type' => 'N/A',
            'city_id' => 3,
            'academy_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Luis',
            'last_name' => 'Pérez',
            'email' => 'luisperez@gmail.com',
            'doc_id' => '16523012',
            'password' => bcrypt(123456),
            'birthday' => DateTime::createFromFormat('d/m/Y', '15/11/1988')->format('Y-m-d'),
            'phone' => '0412-159-12-61',
            'twitter' => 'luisperez',
            'instagram' => 'luisperez',
            'size' => 'L',
            'category' => 'Estudiante/Profesional',
            'type' => 'N/A',
            'city_id' => 5,
            'academy_id' => 3,
        ]);

        DB::table('users')->insert([
            'name' => 'Jose',
            'last_name' => 'Pérez',
            'email' => 'joseperez@gmail.com',
            'doc_id' => '15457779',
            'password' => bcrypt(123456),
            'birthday' => DateTime::createFromFormat('d/m/Y', '29/01/1986')->format('Y-m-d'),
            'phone' => '0412-359-54-45',
            'twitter' => 'joseperez',
            'instagram' => 'joseperez',
            'size' => 'M',
            'category' => 'Estudiante/Profesional',
            'type' => 'N/A',
            'city_id' => 4,
            'academy_id' => 3,
        ]);
    }
}
