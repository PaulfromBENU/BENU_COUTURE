<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticleShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('article_shop')->delete();

        for ($i=1; $i <= 45; $i++) { 
            DB::connection('mysql')->table('article_shop')->insert([
                'article_id' => $i,
                'shop_id' => rand(1, 3),
                'stock' => rand(0, 10),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
