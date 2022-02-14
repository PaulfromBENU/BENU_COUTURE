<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Creation;

use App\Traits\ArticleAnalyzer;
use App\Traits\FiltersGenerator;

class ModelController extends Controller
{
    use ArticleAnalyzer;
    use FiltersGenerator;

    public function show(Request $request)
    {
        $model_name = $request->name;

        // Case model name is not specified, all models are displayed ---------------------------------------
        if ($model_name == '' || $model_name == null) {
            // Compute all filter options, names and status from FiltersGenerator Trait
            $filter_names = $this->getFilterOptions()[1];
            $initial_filters = $this->getInitialFilters($request);
            $request->session()->flash('model_filters', $initial_filters);

            return view('models', ['filter_names' => $filter_names, 'initial_filters' => $initial_filters]);
        }


        // Case model name is specified, specific model is displayed ---------------------------------------
        // Case incorrect creation name has been written in URL
        if (Creation::where('name', $model_name)->count() == 0) {
            return redirect()->route('model-'.app()->getLocale());
        }

        // Case model name is specified, dedicated page with articles is displayed
        $creation = Creation::where('name', $model_name)->first();
        $localized_desc_query = 'description_'.app()->getLocale();
        $localized_desc = $creation->$localized_desc_query;

        $creation_articles = $this->getAvailableArticles($creation);

        // To be updated when relationship with shops including stock has been established
        $sold_articles = $this->getSoldArticles($creation)->slice(0, 4);

        //Select pictures to display next to the creation description
        $model_pictures = collect([]);
        foreach ($creation_articles as $article) {
            $model_pictures->push($article->photos()->first()->file_name);
        }

        // If no article available, display sold article pictures
        if ($model_pictures->count() == 0) {
            foreach ($sold_articles as $sold_article) {
                $model_pictures->push($sold_article->photos()->first()->file_name);
            }
        }
        
        // Keywords selection with localized description for current model
        $localized_keyword_query = 'keyword_'.app()->getLocale();
        // Provide creation keywords in an array
        $keywords = [];
        foreach ($creation->keywords as $keyword) {
            array_push($keywords, $keyword->$localized_keyword_query);
        }

        // Compute all filter options, names and status from FiltersGenerator Trait
        $filter_names = $this->getArticlesFilterOptions()[1];
        $initial_filters = $this->getArticlesInitialFilters($request);
        if (session('model_filters') != null) {
            $initial_filters['colors'] = session('model_filters')['colors'];
            $initial_filters['shops'] = session('model_filters')['shops'];
        }
        
        return view('model', [
            'model' => $creation, 
            'localized_description' => $localized_desc, 
            'articles' => $creation_articles, 
            'sold_articles' => $sold_articles, 
            'keywords' => $keywords,
            'model_pictures' => $model_pictures,
            'filter_names' => $filter_names,
            'initial_filters' => $initial_filters,
        ]);
    }

    public function soldItems(Request $request, string $name) 
    {
        if ($name == '' || $name == null) {
            return redirect()->route('model-'.app()->getLocale());
        }

        $creation = Creation::where('name', $name)->first();
        $sold_articles = $this->getSoldArticles($creation);

        // Compute all filter options, names and status from FiltersGenerator Trait
        $filter_names = $this->getArticlesFilterOptions()[1];
        $initial_filters = $this->getArticlesInitialFilters($request);

        return view('sold-items', ['model_name' => $name, 'model' => $creation, 'sold_articles' => $sold_articles, 'initial_filters' => $initial_filters, 'filter_names' => $filter_names]);
    }
}
