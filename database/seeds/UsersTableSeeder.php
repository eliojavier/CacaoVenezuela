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
            'email' => 'eliojavier86@gmail.com',
            'doc_id' => '17146579',
            'password' => bcrypt(123456),
            'birthday' => DateTime::createFromFormat('d/m/Y', '29/01/1986')->format('Y-m-d'),
            'phone' => '04261058185',
            'address' => 'San Martín',
            'twitter' => 'eliojavier',
            'instagram' => 'eliojavier',
            'size' => 'M',
            'category' => 'Estudiante/Profesional',
            'type' => 'N/A',
            'city_id' => 1,
            'academy_id' => 1,
        ]);
    }
}
