<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

use App\Models\Article;

use App\Traits\FiltersGenerator;

class FilteredArticles extends Component
{
    use FiltersGenerator;

    public $initial_filters;
    public $articles;
    public $creation;

    protected $listeners = ['filtersUpdated' => 'applyFilters'];

    public function mount()
    {
        $this->applyFilters($this->initial_filters);
    }

    public function applyFilters($applied_filters)
    {
        //Initialize filtered models
        $this->articles = collect([]);
        
        // Compute collection of filtered models in FiltersGenerator Trait (required to keep full object relationships)
        $this->articles = $this->getFilteredArticles($this->creation, $applied_filters, 'available')->sortBy('name');

        $this->emit('articlesUpdated');
    }

    public function render()
    {
        return view('livewire.filters.filtered-articles');
    }
}
