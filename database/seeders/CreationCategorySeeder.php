<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('creation_categories')->delete();

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Blouses & chemises',
            'name_en' => 'Blouses & shirts',
            'name_lu' => 'Blouses & chemises Lu',
            'name_de' => 'category.blouses-shirt',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Blousons & vestes',
            'name_en' => 'Jackets & vests',
            'name_lu' => 'Blousons & vestes Lu',
            'name_de' => 'category.jackets-vests',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Bonnets',
            'name_en' => 'Bonnets',
            'name_lu' => 'Bonnets Lu',
            'name_de' => 'category.bonnet',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Écharpes & gants',
            'name_en' => 'Scarfs & gloves',
            'name_lu' => 'Écharpes & gants Lu',
            'name_de' => 'category.scarfs-gloves',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Sacs & trousses',
            'name_en' => 'Bags & cases',
            'name_lu' => 'Sacs & trousses Lu',
            'name_de' => 'category.bags-cases',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Gilets',
            'name_en' => 'Cardigans',
            'name_lu' => 'Gilets Lu',
            'name_de' => 'category.cardigans',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Jeux',
            'name_en' => 'Games',
            'name_lu' => 'Jeux Lu',
            'name_de' => 'category.games',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Jupes',
            'name_en' => 'Skirts',
            'name_lu' => 'Jupes Lu',
            'name_de' => 'category.skirts',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Masques',
            'name_en' => 'Masks',
            'name_lu' => 'Masques Lu',
            'name_de' => 'category.masks',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Pantalons',
            'name_en' => 'Trousers',
            'name_lu' => 'Pantalons Lu',
            'name_de' => 'category.trousers',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Pulls',
            'name_en' => 'Sweaters',
            'name_lu' => 'Pulls Lu',
            'name_de' => 'category.sweaters',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Robes',
            'name_en' => 'Dresses',
            'name_lu' => 'Robes Lu',
            'name_de' => 'category.dresses',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Sous-vêtements',
            'name_en' => 'Underwear',
            'name_lu' => 'Underwear Lu',
            'name_de' => 'category.underwear',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'T-shirts',
            'name_en' => 'Tee-shirts',
            'name_lu' => 'T-shirt Lu',
            'name_de' => 'category.tee-shirts',
        ]);

        DB::connection('mysql')->table('creation_categories')->insert([
            'name_fr' => 'Tops',
            'name_en' => 'Tops',
            'name_lu' => 'Tops Lu',
            'name_de' => 'category.tops',
        ]);
    }
}
