<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql_common')->table('delivery_countries')->truncate();

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'LU',
            'country_lu' => "Lëtzebuerg",
            'country_de' => "Luxembourg",
            'country_en' => "Luxemburg",
            'country_fr' => "Luxembourg",
            'delivery_zone' => '1',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'BE',
            'country_lu' => "Belgique",
            'country_de' => "Belgique",
            'country_en' => "Belgium",
            'country_fr' => "Belgique",
            'delivery_zone' => '2',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'NL',
            'country_lu' => "Netherlands",
            'country_de' => "Netherlands",
            'country_en' => "Netherlands",
            'country_fr' => "Pays-Bas",
            'delivery_zone' => '2',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'DE',
            'country_lu' => "Deutschland",
            'country_de' => "Deutschland",
            'country_en' => "Deutschland",
            'country_fr' => "Allemagne",
            'delivery_zone' => '3',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'FR',
            'country_lu' => "France",
            'country_de' => "France",
            'country_en' => "France",
            'country_fr' => "France",
            'delivery_zone' => '3',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'AU',
            'country_lu' => "Austria",
            'country_de' => "Austria",
            'country_en' => "Austria",
            'country_fr' => "Autriche",
            'delivery_zone' => '3',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'CH',
            'country_lu' => "Switzerland",
            'country_de' => "Switzerland",
            'country_en' => "Switzerland",
            'country_fr' => "Suisse",
            'delivery_zone' => '4',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'CZ',
            'country_lu' => "Czech Republic",
            'country_de' => "Czech Republic",
            'country_en' => "Czech Republic",
            'country_fr' => "République Tchèque",
            'delivery_zone' => '4',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'DK',
            'country_lu' => "Danemark",
            'country_de' => "Danemark",
            'country_en' => "Danemark",
            'country_fr' => "Danemark",
            'delivery_zone' => '4',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'FI',
            'country_lu' => "Finland",
            'country_de' => "Finland",
            'country_en' => "Finland",
            'country_fr' => "Finlande",
            'delivery_zone' => '4',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'IT',
            'country_lu' => "Italy",
            'country_de' => "Italy",
            'country_en' => "Italy",
            'country_fr' => "Italie",
            'delivery_zone' => '4',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'PT',
            'country_lu' => "Portugal",
            'country_de' => "Portugal",
            'country_en' => "Portugal",
            'country_fr' => "Portugal",
            'delivery_zone' => '4',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'SE',
            'country_lu' => "Slovenia",
            'country_de' => "Slovenia",
            'country_en' => "Slovenia",
            'country_fr' => "Slovénie",
            'delivery_zone' => '4',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'SK',
            'country_lu' => "Slovakia",
            'country_de' => "Slovakia",
            'country_en' => "Slovakia",
            'country_fr' => "Slovaquie",
            'delivery_zone' => '4',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'ES',
            'country_lu' => "Spuenien",
            'country_de' => "Spanien",
            'country_en' => "Spain",
            'country_fr' => "Espagne",
            'delivery_zone' => '5',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'GR',
            'country_lu' => "Griichenland",
            'country_de' => "Griechenland",
            'country_en' => "Greece",
            'country_fr' => "Grèce",
            'delivery_zone' => '5',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'HU',
            'country_lu' => "Ungarn",
            'country_de' => "Ungarn",
            'country_en' => "Hungary",
            'country_fr' => "Hongrie",
            'delivery_zone' => '5',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'IR',
            'country_lu' => "Irland",
            'country_de' => "Irland",
            'country_en' => "Ireland",
            'country_fr' => "Irlande",
            'delivery_zone' => '5',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'IS',
            'country_lu' => "Island",
            'country_de' => "Island",
            'country_en' => "Iceland",
            'country_fr' => "Islande",
            'delivery_zone' => '5',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'LT',
            'country_lu' => "Litauen",
            'country_de' => "Litauen",
            'country_en' => "Lituania",
            'country_fr' => "Lituanie",
            'delivery_zone' => '5',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'NO',
            'country_lu' => "Norwegen",
            'country_de' => "Norwegen",
            'country_en' => "Norway",
            'country_fr' => "Norvège",
            'delivery_zone' => '5',
        ]);

        DB::connection('mysql_common')->table('delivery_countries')->insert([
            'country_code' => 'UK',
            'country_lu' => "Vereenegt Kinnekräich",
            'country_de' => "Vereinigtes Königreich",
            'country_en' => "United Kingdom",
            'country_fr' => "Royaume-Uni",
            'delivery_zone' => '5',
        ]);
    }
}
