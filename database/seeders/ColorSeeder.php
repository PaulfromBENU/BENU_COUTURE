<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('colors')->delete();

        DB::connection('mysql')->table('colors')->insert([
            'name' => 'green',
            'hex_code' => '#27955B',
        ]);
        DB::connection('mysql')->table('colors')->insert([
            'name' => 'red',
            'hex_code' => '#D41C1B',
        ]);
        DB::connection('mysql')->table('colors')->insert([
            'name' => 'grey',
            'hex_code' => '#a1b2cf',
        ]);
        DB::connection('mysql')->table('colors')->insert([
            'name' => 'purple',
            'hex_code' => '#793162',
        ]);
        DB::connection('mysql')->table('colors')->insert([
            'name' => 'brown',
            'hex_code' => '#64422C',
        ]);
        DB::connection('mysql')->table('colors')->insert([
            'name' => 'blue',
            'hex_code' => '#0079A7',
        ]);
        DB::connection('mysql')->table('colors')->insert([
            'name' => 'orange',
            'hex_code' => '#FF9300',
        ]);
        DB::connection('mysql')->table('colors')->insert([
            'name' => 'yellow',
            'hex_code' => '#FFFB00',
        ]);

    }
}
