<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([[ 
            'name' => 'Doctor Strange in the Multiverse of Madnes',
            'releasedate' => '2022-05-04',
            'director' => 'Sam Raimi',
            'productioncompanies' => 'Marvel Studios',
            'duration' => '158',
            'countryproduction' => 'Etats-Unis',
            'budget' => '200',
            'personnages_id' => '1',
        ],
        [ 
            'name' => 'Avengers: Infinity War',
            'releasedate' => '2018-05-04',
            'director' => 'Joe & Antony Russo',
            'productioncompanies' => 'Marvel Studios',
            'duration' => '149',
            'countryproduction' => 'Etats-Unis',
            'budget' => '250',
            'personnages_id' => '1',
        ],
        [ 
            'name' => 'Captain America: Civil War',
            'releasedate' => '2016-08-02',
            'director' => 'Joe & Antony Russo',
            'productioncompanies' => 'Marvel Studios',
            'duration' => '150',
            'countryproduction' => 'Etats-Unis',
            'budget' => '190',
            'personnages_id' => '1',
        ],
        [ 
            'name' => 'Spider-Man : No Way Home',
            'releasedate' => '2021-12-15',
            'director' => 'Sam Raimi',
            'productioncompanies' => 'Marvel Studios',
            'duration' => '148',
            'countryproduction' => 'Etats-Unis',
            'budget' => '250',
            'personnages_id' => '1',
        ]]);
    }
}
