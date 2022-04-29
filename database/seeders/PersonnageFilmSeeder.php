<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnageFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnages_films')->insert([[ 
            'films_id' => '1',
            'personnage_id' => '1',
        ],
        [ 
            'films_id' => '2',
            'personnage_id' => '2',
        ],
        [ 
            'films_id' => '3',
            'personnage_id' => '3',
        ],
        [ 
            'films_id' => '2',
            'personnage_id' => '1',
        ]]);
    }
}
