<?php

namespace App\Traits;

use App\Models\Article;
use App\Models\Creation;
use App\Models\Stock;

trait ArticleAnalyzer {

    public function stock(Article $article) 
    {
        $shops = $article->shops;
        $stock = 0;
        foreach ($shops as $shop) {
            $stock += $shop->pivot->stock;
        }

        return $stock;
    }

    public function getAvailableCreations()
    {
        $all_creations = Creation::all();
        $available_creations = collect([]);

        foreach ($all_creations as $creation) {
            if ($this->getAvailableArticles($creation)->count() > 0) {
                $available_creations->push($creation);
            }
        }

         return $available_creations;
    }

    public function getAvailableArticles(Creation $creation)
    {
        $available_articles = collect([]);
        foreach ($creation->articles as $article) {
             if ($this->stock($article) > 0) {
                 $available_articles->push($article);
             }
         }

         return $available_articles;
    }

    public function getSoldArticles(Creation $creation)
    {
        $sold_articles = collect([]);
        foreach ($creation->articles as $article) {
             if ($this->stock($article) == 0) {
                 $sold_articles->push($article);
             }
         }

         return $sold_articles;
    }
}