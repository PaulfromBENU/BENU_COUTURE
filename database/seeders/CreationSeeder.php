<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('creations')->delete();
        
        $name_options = ['Caretta', 'Pangolin', 'Pinni', 'Chiru', 'Shrubby', 'Porites', 'Cervico', 'Sumatan', 'Narwal', 'Jentinki', 'Bilby'];
        //$gender_options = ['male', 'female', 'neutral'];

        for ($i=0; $i < 6; $i++) { 
            DB::connection('mysql')->table('creations')->insert([
                'name' => $name_options[$i],
                //'creation_group_id' => rand(1, 6),
                'creation_category_id' => rand(1, 15),
                //'gender' => $gender_options[array_rand($gender_options)],
                'price' => 6 * rand(1, 35),
                'description_lu' => 'Une description du modèle en langue luxembourgeoise. Très intéréssant !',
                'description_en' => 'Une description du modèle en langue anglaise. Très intéréssant !',
                'description_de' => 'creation.desc-creation_name',
                'description_fr' => 'Les blouses pour femmes CARETTA de BENU COUTURE sont confectionnées à partir de matières légères et sont parfaites pour les changements de saison ou les nuits d’été. Elles créent un sentiment de bien-être et flattent la personne qui les porte! Les matériaux utilisés sont principalement des chemises en coton, selon le cas des chemises synthétiques, et des boutons réutilisés.',
                'origin_link' => 'https://de.wikipedia.org/wiki/Narwal',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

        for ($i=6; $i < 11; $i++) { 
            DB::connection('mysql')->table('creations')->insert([
                'name' => $name_options[$i],
                //'creation_group_id' => rand(1, 6),
                'creation_category_id' => rand(1, 15),
                //'gender' => $gender_options[array_rand($gender_options)],
                'price' => 6 * rand(1, 35),
                'description_lu' => 'Une description du modèle partenaire en langue luxembourgeoise. Très intéréssant !',
                'description_en' => 'Une description du modèle partenaire en langue anglaise. Très intéréssant !',
                'description_de' => 'Une description du modèle partenaire en langue allemande. Très intéréssant !',
                'description_fr' => 'Une description du modèle partenaire en langue française. Très intéréssant !',
                'origin_link' => 'https://de.wikipedia.org/wiki/Narwal',
                'partner_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
