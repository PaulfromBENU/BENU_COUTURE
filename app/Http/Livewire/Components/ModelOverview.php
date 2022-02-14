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
    public $filters_color_link;
    public $filters_shop_link;
    
    protected $listeners = ['updateLinksWithFilters' => 'addFiltersToLinks'];

    public function mount()
    {
        $this->initializeData();
    }

    public function initializeData()
    {
        $this->available_colors = [];
        $this->pictures = collect([]);
        foreach ($this->model->articles as $article) {
            $this->pictures->push($article->photos()->first()->file_name);
        }

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

    public function addFiltersToLinks($applied_filters)
    {
        $this->filters_color_link = "";
        $this->filters_shop_link = "";

        //Create strings to append to links, to preserve filter selection from one page to the other
        foreach ($applied_filters['colors'] as $color => $filter) {
            if ($filter == 1) {
                $this->filters_color_link .= $color.'*';
            }
        }
        //Clean string
        if (substr($this->filters_color_link, -1) == '*') {
            $this->filters_color_link = substr($this->filters_color_link, 0, -1);
        }

        foreach ($applied_filters['shops'] as $shop => $filter) {
            if ($filter == 1) {
                $this->filters_shop_link .= $shop.'*';
            }
        }
        // Clean string
        if (substr($this->filters_shop_link, -1) == '*') {
            $this->filters_shop_link = substr($this->filters_shop_link, 0, -1);
        }

        $this->initializeData();//Required to keep all data as objects
    }

    public function render()
    {
        return view('livewire.components.model-overview');
    }
}
