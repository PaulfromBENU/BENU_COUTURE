<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

use App\Models\Creation;

use App\Traits\FiltersGenerator;

class FilteredModels extends Component
{
    use FiltersGenerator;

    public $initial_filters;
    public $sections_number;
    public $filtered_models;
    public $displayed_models;

    protected $listeners = ['filtersUpdated' => 'applyFilters'];

    public function mount()
    {
        $this->applyFilters($this->initial_filters);
    }

    public function applyFilters($applied_filters)
    {
        //Initialize filtered models
        $this->filtered_models = collect([]);
        
        // Compute collection of filtered models in FiltersGenerator Trait (required to keep full object relationships)
        $this->filtered_models = $this->getFilteredCreations($applied_filters);

        //Count number of required sections based on total number of creations
        $this->sections_number = floor($this->filtered_models->count() / 6) + 1;

        for ($i=0; $i < $this->sections_number; $i++) { 
            $this->displayed_models[$i] = $this->filtered_models->sortByDesc('updated_at')->slice(6 * $i, 6);
        }
    }

    // public function addFiltersToLinks($applied_filters)
    // {
    //     $this->filters_color_link = "";
    //     $this->filters_shop_link = "";

    //     //Create strings to append to links, to preserve filter selection from one page to the other
    //     foreach ($applied_filters['colors'] as $color => $filter) {
    //         if ($filter == 1) {
    //             $this->filters_color_link .= $color.'*';
    //         }
    //     }
    //     //Clean string
    //     if (substr($this->filters_color_link, -1) == '*') {
    //         $this->filters_color_link = substr($this->filters_color_link, 0, -1);
    //     }

    //     foreach ($applied_filters['shops'] as $shop => $filter) {
    //         if ($filter == 1) {
    //             $this->filters_shop_link .= $shop.'*';
    //         }
    //     }
    //     // Clean string
    //     if (substr($this->filters_shop_link, -1) == '*') {
    //         $this->filters_shop_link = substr($this->filters_shop_link, 0, -1);
    //     }
    // }

    public function render()
    {
        return view('livewire.filters.filtered-models');
    }
}
