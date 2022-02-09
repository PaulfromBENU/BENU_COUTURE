<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Creation;

use App\Traits\ArticleAnalyzer;

class ModelController extends Controller
{
    use ArticleAnalyzer;

    public function show(Request $request)
    {
        $model_name = $request->name;

        // Case model name is not specified, all models are displayed
        if ($model_name == '' || $model_name == null) {
            //Count number of required sections based on total number of creations
            $sections_number = floor(Creation::count() / 6) + 1;

            for ($i=0; $i < $sections_number; $i++) { 
                $all_models[$i] = Creation::orderBy('updated_at', 'desc')->offset(6 * $i)->limit(6)->get();
            }

            return view('models', ['sections_number' => $sections_number, 'all_models' => $all_models]);
        }

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

        // Keywords selection with localized description for current model
        $localized_keyword_query = 'keyword_'.app()->getLocale();
        // Provide creation keywords in an array
        $keywords = [];
        foreach ($creation->keywords as $keyword) {
            array_push($keywords, $keyword->$localized_keyword_query);
        }
        
        return view('model', [
            'model' => $creation, 
            'localized_description' => $localized_desc, 
            'articles' => $creation_articles, 
            'sold_articles' => $sold_articles, 
            'keywords' => $keywords]);
    }

    public function soldItems(string $name) 
    {
        if ($name == '' || $name == null) {
            return redirect()->route('model-'.app()->getLocale());
        }

        $creation = Creation::where('name', $name)->first();
        $sold_articles = $this->getSoldArticles($creation);
        return view('sold-items', ['model_name' => $name, 'sold_articles' => $sold_articles]);
    }
}
