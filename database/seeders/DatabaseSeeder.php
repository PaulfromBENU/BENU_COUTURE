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
            // Not imported, or simply updated with the importation
            // UserSeeder::class,
            // PartnerSeeder::class,
            // ShopSeeder::class,
            // TranslationSeeder::class,

            // Imported - Use data importation route
            // ColorSeeder::class,
            // SizeSeeder::class,
            // CreationGroupSeeder::class,
            // CreationCategorySeeder::class,
            // KeywordSeeder::class,
            // CreationSeeder::class,
            // CreationCreationGroupSeeder::class,
            // CreationAccessorySeeder::class,
            // CareRecommendationSeeder::class,
            // CompositionSeeder::class,
            // ArticleSeeder::class,
            // PhotoSeeder::class,
            // CreationKeywordSeeder::class,
            // ArticleShopSeeder::class,
            // ArticlePhotoSeeder::class,
            // ArticleCompositionSeeder::class,
            // ArticleCareRecommendationSeeder::class,

            DeliveryCountrySeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
