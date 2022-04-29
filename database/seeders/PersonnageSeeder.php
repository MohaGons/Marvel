<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnages')->insert([[ 
            'user_id' => '1',
            'firstname' => 'Elizabeth',
            'lastname' => 'Olsen',
            'charactername' => 'Wanda Maximoff alias la Sorcière Rouge',
            'photo' => 'wanda.jpg',
            'age' => '32',
            'power' => 'Combattante experte, Pouvoirs psioniques',
            'dateofbirth' => '1988-12-12',
        ],
        [ 
            'user_id' => '1',
            'firstname' => 'Chris',
            'lastname' => 'Evans',
            'charactername' => 'Steeve Rogers alias Captain America',
            'photo' => 'captain.jpg',
            'age' => '32',
            'power' => 'Superforce',
            'dateofbirth' => '1917-04-07',
        ],
        [ 
            'user_id' => '1',
            'firstname' => 'Tom',
            'lastname' => 'Holland',
            'charactername' => 'Peter Parker alias Spider Man',
            'photo' => 'spiderman.jpg',
            'age' => '20',
            'power' => 'Sens de l araignée',
            'dateofbirth' => '1997-08-20',
        ],
        [ 
            'user_id' => '1',
            'firstname' => 'Benedict',
            'lastname' => 'Cumberbatch',
            'charactername' => 'Doctor Steven Strange Alias Doctor Strange',
            'photo' => 'doctor.jpg',
            'age' => '20',
            'power' => 'Magicien, controle le temps',
            'dateofbirth' => '1980-08-20',
        ]]);
    }
}
