    <?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        $roles = [
            [
                'name'         => 'super_admin',
                'display_name' => 'Super Administrador',
                'description'  => 'Posee todos los permisos de sistema'
            ],
            [
                'name'         => 'judge',
                'display_name' => 'Juez',
                'description'  => 'Juez del concurso'
            ],
            [
                'name'         => 'participant',
                'display_name' => 'Participante',
                'description'  => 'Participante del concurso'
            ]
        ];
        DB::table('roles')->insert($roles);

    }
}