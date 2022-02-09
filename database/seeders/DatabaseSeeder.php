<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            CreationGroupSeeder::class,
            CreationCategorySeeder::class,
            PartnerSeeder::class,
            KeywordSeeder::class,
            CreationSeeder::class,
            CreationAccessorySeeder::class,
            CareRecommendationSeeder::class,
            CompositionSeeder::class,
            ShopSeeder::class,
            ArticleSeeder::class,
            PhotoSeeder::class,
            CreationKeywordSeeder::class,
            ArticleShopSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
