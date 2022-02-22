<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql_common')->table('users')->delete();
        
         DB::connection('mysql_common')->table('users')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email' => 'paul.guillard@benu.lu',
            'password' => Hash::make('password00'),
            'role' => 'admin',
            'first_name' => 'Paul',
            'last_name' => 'Guillard',
            'gender' => 'Male',
            'company' => 'BENU',
            'phone' => '+352 123 456 789',
            'is_over_18' => '1',
            'legal_ok' => '1',
            'newsletter' => '1',
            'origin' => 'couture',
            'client_number' => 'C00001',
            'general_comment' => "No comment",
        ]);

        $role_options = ['user', 'newsletter', 'author'];
        $gender_options = ['male', 'female', 'neutral', ''];
        $email_options = ['gmail.com', 'hotmail.com', 'yahoo.lu'];
        $first_name_options = ['Bob', 'John', 'Vanessa', 'Alice', 'Vero', 'Pierre'];
        $company_options = ['BENU', 'Amazon', 'Delphi', '', 'PwC'];

        for ($i=0; $i < 10; $i++) { 
            DB::connection('mysql_common')->table('users')->insert([
                'email' => Str::random(10).'@'.$email_options[array_rand($email_options)],
                'password' => Hash::make('password00'),
                'role' => $role_options[array_rand($role_options)],
                'first_name' => $first_name_options[array_rand($first_name_options)],
                'last_name' => Str::random(10),
                'gender' => $gender_options[array_rand($gender_options)],
                'company' => $company_options[array_rand($company_options)],
                'phone' => '+352 123 456 789',
                'is_over_18' => '1',
                'legal_ok' => '1',
                'newsletter' => '1',
                'origin' => 'couture',
                'client_number' => 'C00'.rand(10, 99).$i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'general_comment' => "No comment",
            ]);
        }
    }
}
