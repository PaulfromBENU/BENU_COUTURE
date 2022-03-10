<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('translations')->delete();

        $key_options_dashboard = [
            "nav-hello-evening" => "Bonsoir",
            "nav-hello-day" => "Bonjour",
            "nav-overview" => "Tableau de bord",
            "nav-orders" => "Mes commandes",
            "nav-demands" => "Mes demandes",
            "nav-returns" => "Mes retours",
            "nav-wishlist" => "Ma wishlist",
            "nav-addresses" => "Mes adresses",
            "nav-details" => "Détails du compte",
            "nav-delete" => "Suppression du compte",
            "nav-logout" => "Me déconnecter",
            "overview-title-1" => "Mes détails",
            "overview-title-2" => "Mes adresses",
            "overview-title-3" => "Mes commandes",
            "overview-title-4" => "Mes demandes",
            "overview-title-5" => "Mes retours",
            "overview-title-6" => "Ma Wishlist",
            "overview-member-since" => "Membre depuis le ",
            "overview-account-details" => "Détails du compte",
            "overview-delete-account" => "Supprimer mon compte",
            "overview-update-address" => "Ajouter, modifier ou supprimer des adresses.",
            "overview-all-addresses" => "Voir toutes mes adresses",
            "overview-update-orders" => "Gérer, modifier, supprimer mes commandes",
            "overview-all-orders" => "Voir toutes mes commandes",
            "overview-update-demands" => "Gérer, modifier, supprimer mes demandes",
            "overview-all-demands" => "Voir toutes mes demandes",
            "overview-update-returns" => "Vérifier mes retours",
            "overview-all-returns" => "Voir tous mes retours",
            "overview-update-wishlist" => "Gérer et modifier ma wishlist",
            "overview-see-wishlist" => "Voir ma wishlist",
        ];

        foreach ($key_options_dashboard as $key => $translation) {
            DB::connection('mysql')->table('translations')->insert([
                'page' => 'dashboard',
                'key' => $key,
                'fr' => $translation,
                'en' => $translation,
                'de' => 'dashboard.'.$key,
                'lu' => $translation,
                'translation_key' => 'dashboard.'.$key,
            ]);
        }
    }
}
