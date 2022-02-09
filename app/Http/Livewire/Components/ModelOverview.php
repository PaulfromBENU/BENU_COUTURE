<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

use App\Traits\ArticleAnalyzer;

class ModelOverview extends Component
{
    use ArticleAnalyzer;

    public $model;
    public $model_category;
    public $available_colors;
    public $pictures;
    public $available_articles_count;

    public function mount()
    {
        $this->available_colors = [];
        $this->pictures = collect([]);
        foreach ($this->model->articles as $article) {
            $this->pictures->push($article->photos()->first()->file_name);
        }
        $this->initializeData();
    }

    public function initializeData()
    {
        // Model category with localized translation
        $localized_category_query = 'name_'.app()->getLocale();
        $this->model_category = $this->model->creation_category->$localized_category_query;

        // Get all available colors from available articles
        foreach ($this->getAvailableArticles($this->model) as $article) {
            if (!in_array($article->color, $this->available_colors)) {
                array_push($this->available_colors, $article->color);
            }
            // Add pictures selection logic here
        }

        // Compute available articles count
        $this->available_articles_count = $this->getAvailableArticles($this->model)->count();
    }

    public function render()
    {
        return view('livewire.components.model-overview');
    }
}
