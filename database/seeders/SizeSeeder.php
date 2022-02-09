<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('sizes')->delete();
        
        $category_options = ['adult', 'kid', 'other'];
        $value_options = ['XS', 'S', 'M', 'L', 'XL', 'XXL', '38', '40', '42', '44'];

        for ($i=0; $i < 10; $i++) { 
            DB::connection('mysql')->table('sizes')->insert([
                'category' => $category_options[array_rand($category_options)],
                'value' => $value_options[array_rand($value_options)],
            ]);
        }
    }
}
