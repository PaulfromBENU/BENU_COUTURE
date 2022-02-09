<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreationKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('creation_keyword')->delete();

        for ($i=0; $i < 40; $i++) { 
            DB::connection('mysql')->table('creation_keyword')->insert([
                'creation_id' => rand(1, 20),
                'keyword_id' => rand(1, 19),
            ]);
        }
    }
}
