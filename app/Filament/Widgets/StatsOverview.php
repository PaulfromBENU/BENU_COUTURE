<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

use Carbon\Carbon;

use App\Models\Article;
use App\Models\Translation;
use App\Models\User;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getCards(): array
    {
        $number_of_days = 7;

        // Static Data
        $sold_articles_total = Article::whereHas('shops', function($query) {
            $query->where('stock', '0');
        })->count();

        $articles_in_stock = Article::whereHas('shops', function($query) {
            $query->where('stock', '<>', '0');
        })->count();

        // Compute data evolution for chart display
        $last_users_count = [];
        $sold_articles_count = [];
        $articles_in_stock_count = [];
        $variations_count = [];

        for ($i=$number_of_days; $i >= 0; $i--) { 
            array_push($last_users_count, User::where('created_at', '<', Carbon::now()->subDays($i))->count());
            array_push($sold_articles_count, Article::whereHas('shops', function($query) use($i) {
                $query->where('stock', '0')->where('article_shop.updated_at', '<', Carbon::now()->subDays($i));
            })->count());
            array_push($articles_in_stock_count, Article::whereHas('shops', function($query) use($i) {
                $query->where('stock', '>', '0')->where('article_shop.updated_at', '<', Carbon::now()->subDays($i));
            })->count());
            array_push($variations_count, Article::where('updated_at', '<', Carbon::now()->subDays($i))->count());
        }

        // Trends evaluation
        $users_last_period = User::where('created_at', '>', Carbon::now()->subDays($number_of_days))->where('created_at', '<=', Carbon::now())->count();
        $users_previous_period = User::where('created_at', '>', Carbon::now()->subDays($number_of_days * 2))->where('created_at', '<=', Carbon::now()->subDays($number_of_days))->count();
        $users_delta = $users_last_period - $users_previous_period;
        if ($users_delta < 0) {
            $users_icon = 'heroicon-s-trending-down';
            $user_color = 'danger';
        } elseif ($users_delta > 0) {
            $users_icon = 'heroicon-s-trending-up';
            $user_color = 'success';
        } else {
            $users_icon = 'heroicon-s-arrow-narrow-right';
            $user_color = 'warning';
        }

        return [
            Card::make('Number of users registered', User::count())
            ->description('Over 8 days')
            ->descriptionIcon($users_icon)
            ->chart($last_users_count)
            ->color($user_color),
            Card::make('Total number of variations', Article::count())
            ->description('Over 8 days')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($variations_count)
            ->color('success'),
            Card::make('Variations sold (total)', $sold_articles_total)
            ->description('Over 8 days')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($sold_articles_count)
            ->color('success'),
            Card::make('Variations in stock', $articles_in_stock)
            ->description('Over 8 days')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($articles_in_stock_count)
            ->color('success'),
            Card::make('Missing translations', Translation::whereColumn('translation_key', 'de')->count()),
        ];
    }
}
