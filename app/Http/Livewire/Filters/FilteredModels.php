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

        // WARNING : OBJECTS ARE SERIALIZED INTO ARRAYS WHEN BEING PROCESSED BY LIVEWIRE, DUE TO PHP TO JS CONVERSION
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

    public function render()
    {
        return view('livewire.filters.filtered-models');
    }
}
