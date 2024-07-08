<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'usuario' => 'Director',
                'email' => 'director@gmail.com',
                'role' => 'director',
                
                'password' => bcrypt('password'),
                'foto' => 'perfil.png',
                'nombre' => 'Director',
                'apellido' => 'Director',
                'telefono' => '09999999999',
                'fecha_naci' => '2023-11-07',
                'sexo' => 'Hombre',
                'nom_artis' => 'Director Los 40',
                'nacionalidad' => 'Ecuador',
                'pais_resi'=> 'Ecuador',
                'ciudad_resi' => 'Quito',
                'direccion' => 'No disponible',
                'facebook' => 'No dispoible',
                'twitter' => 'No dispoible',
                'instagram' => 'No dispoible',
                'youtube' => 'No dispoible',
                'biografia' => 'No dispoible',
                'talla_cami' => 'No disponible',
                'estado' => '1'


            ],
            [
                'usuario' => 'Coordinador',
                'email' => 'coordinador@gmail.com',
                'role' => 'coordinador',
                
                'password' => bcrypt('password'),
                'foto' => 'perfil.png',
                'nombre' => 'Coordinador',
                'apellido' => 'Coordinador',
                'telefono' => '09999999999',
                'fecha_naci' => '2023-11-07',
                'sexo' => 'Hombre',
                'nom_artis' => 'Coordinador Los 40',
                'nacionalidad' => 'Ecuador',
                'pais_resi'=> 'Ecuador',
                'ciudad_resi' => 'Quito',
                'direccion' => 'No disponible',
                'facebook' => 'No dispoible',
                'twitter' => 'No dispoible',
                'instagram' => 'No dispoible',
                'youtube' => 'No dispoible',
                'biografia' => 'No dispoible',
                'talla_cami' => 'No disponible',
                'estado' => '1'


            ],
            [
                'usuario' => 'Productor',
                'email' => 'productor@gmail.com',
                'role' => 'productor',
                
                'password' => bcrypt('password'),
                'foto' => 'perfil.png',
                'nombre' => 'Productor',
                'apellido' => 'Productor',
                'telefono' => '09999999999',
                'fecha_naci' => '2023-11-07',
                'sexo' => 'Hombre',
                'nom_artis' => 'Productor Los 40',
                'nacionalidad' => 'Ecuador',
                'pais_resi'=> 'Ecuador',
                'ciudad_resi' => 'Quito',
                'direccion' => 'No disponible',
                'facebook' => 'No dispoible',
                'twitter' => 'No dispoible',
                'instagram' => 'No dispoible',
                'youtube' => 'No dispoible',
                'biografia' => 'No dispoible',
                'talla_cami' => 'No disponible',
                'estado' => '1'


            ],
            [
                'usuario' => 'karina',
                'email' => 'karina@gmail.com',
                'role' => 'locutor',
                
                'password' => bcrypt('password'),
                'foto' => 'perfil.png',
                'nombre' => 'Karina',
                'apellido' => 'Arias',
                'telefono' => '09999999999',
                'fecha_naci' => '2023-11-07',
                'sexo' => 'Hombre',
                'nom_artis' => 'Locutor Los 40',
                'nacionalidad' => 'Ecuador',
                'pais_resi'=> 'Ecuador',
                'ciudad_resi' => 'Quito',
                'direccion' => 'No disponible',
                'facebook' => 'No dispoible',
                'twitter' => 'No dispoible',
                'instagram' => 'No dispoible',
                'youtube' => 'No dispoible',
                'biografia' => 'No dispoible',
                'talla_cami' => 'No disponible',
                'estado' => '1'


            ]

        ]);
    }
}
