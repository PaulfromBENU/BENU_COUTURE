<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '0.05',
            'fee_zone_1' => "1",
            'fee_zone_2' => "1.40",
            'fee_zone_3' => "1.40",
            'fee_zone_4' => "1.40",
            'fee_zone_5' => "1.40",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '0.5',
            'fee_zone_1' => "2",
            'fee_zone_2' => "4.20",
            'fee_zone_3' => "4.20",
            'fee_zone_4' => "4.20",
            'fee_zone_5' => "4.20",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '0.9',
            'fee_zone_1' => "6.13",
            'fee_zone_2' => "11.15",
            'fee_zone_3' => "13.87",
            'fee_zone_4' => "17.04",
            'fee_zone_5' => "19.31",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '1.7',
            'fee_zone_1' => "6.13",
            'fee_zone_2' => "11.63",
            'fee_zone_3' => "14.23",
            'fee_zone_4' => "18.49",
            'fee_zone_5' => "22.35",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '2.6',
            'fee_zone_1' => "7.07",
            'fee_zone_2' => "12.10",
            'fee_zone_3' => "14.76",
            'fee_zone_4' => "19.92",
            'fee_zone_5' => "25.62",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '3.6',
            'fee_zone_1' => "7.07",
            'fee_zone_2' => "12.59",
            'fee_zone_3' => "15.21",
            'fee_zone_4' => "21.37",
            'fee_zone_5' => "28.83",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '4.6',
            'fee_zone_1' => "7.07",
            'fee_zone_2' => "12.65",
            'fee_zone_3' => "15.92",
            'fee_zone_4' => "22.82",
            'fee_zone_5' => "28.83",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '5.5',
            'fee_zone_1' => "7.07",
            'fee_zone_2' => "13.12",
            'fee_zone_3' => "16.40",
            'fee_zone_4' => "23.46",
            'fee_zone_5' => "28.83",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '6.4',
            'fee_zone_1' => "7.07",
            'fee_zone_2' => "13.59",
            'fee_zone_3' => "16.95",
            'fee_zone_4' => "23.99",
            'fee_zone_5' => "28.83",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '7.3',
            'fee_zone_1' => "7.07",
            'fee_zone_2' => "14.04",
            'fee_zone_3' => "17.52",
            'fee_zone_4' => "25.34",
            'fee_zone_5' => "28.83",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '8.3',
            'fee_zone_1' => "7.07",
            'fee_zone_2' => "14.51",
            'fee_zone_3' => "17.52",
            'fee_zone_4' => "26.29",
            'fee_zone_5' => "28.83",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '9',
            'fee_zone_1' => "7.07",
            'fee_zone_2' => "14.97",
            'fee_zone_3' => "17.52",
            'fee_zone_4' => "28.04",
            'fee_zone_5' => "28.83",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '11',
            'fee_zone_1' => "8.55",
            'fee_zone_2' => "15.54",
            'fee_zone_3' => "18.54",
            'fee_zone_4' => "30.57",
            'fee_zone_5' => "41.47",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '12.8',
            'fee_zone_1' => "8.55",
            'fee_zone_2' => "16.46",
            'fee_zone_3' => "19.19",
            'fee_zone_4' => "33.24",
            'fee_zone_5' => "46.04",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '14.8',
            'fee_zone_1' => "8.55",
            'fee_zone_2' => "17.36",
            'fee_zone_3' => "19.61",
            'fee_zone_4' => "35.92",
            'fee_zone_5' => "48.60",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '16.7',
            'fee_zone_1' => "8.55",
            'fee_zone_2' => "18.27",
            'fee_zone_3' => "20.35",
            'fee_zone_4' => "38.61",
            'fee_zone_5' => "52.99",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '18.7',
            'fee_zone_1' => "8.55",
            'fee_zone_2' => "18.62",
            'fee_zone_3' => "21.08",
            'fee_zone_4' => "41.28",
            'fee_zone_5' => "57.37",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '23.5',
            'fee_zone_1' => "9.05",
            'fee_zone_2' => "19.49",
            'fee_zone_3' => "22.67",
            'fee_zone_4' => "47.98",
            'fee_zone_5' => "62.95",
        ]);

        DB::connection('mysql_common')->table('delivery_fees')->insert([
            'max_weight' => '28.5',
            'fee_zone_1' => "9.05",
            'fee_zone_2' => "20.55",
            'fee_zone_3' => "23.81",
            'fee_zone_4' => "54.70",
            'fee_zone_5' => "66.51",
        ]);
    }
}
