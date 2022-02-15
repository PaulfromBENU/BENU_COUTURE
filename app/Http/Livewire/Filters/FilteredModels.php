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
    public $sort_direction;

    protected $listeners = ['filtersUpdated' => 'applyFilters', 'sortUpdated' => 'changeSorting'];

    public function mount()
    {
        $this->sort_direction = 'asc';
        $this->applyFilters($this->initial_filters);
    }

    public function applyFilters($applied_filters)
    {
        //Initialize filtered models
        $this->filtered_models = collect([]);
        
        // Compute collection of filtered models in FiltersGenerator Trait (required to keep full object relationships)
        $this->filtered_models = $this->getFilteredCreations($applied_filters);

        $this->sortAndDivide();
    }

    public function changeSorting(string $sort_dir, $applied_filters)
    {
        if ($sort_dir == 'desc') {
            $this->sort_direction = 'desc';
        } else {
            $this->sort_direction = 'asc';
        }

        $this->applyFilters($applied_filters); //Necessary to avoid models conversion to array
    }

    public function sortAndDivide()
    {   
        //Count number of required sections based on total number of creations
        $this->sections_number = floor($this->filtered_models->count() / 6) + 1;

        for ($i=0; $i < $this->sections_number; $i++) { 
            if ($this->sort_direction == 'desc') {
                $this->displayed_models[$i] = $this->filtered_models->sortByDesc(function($creation){
                    return $creation->price;
                })->slice(6 * $i, 6)->values();
            } else {
                $this->displayed_models[$i] = $this->filtered_models->sortBy(function($creation){
                    return $creation->price;
                })->slice(6 * $i, 6)->values();
            }
        }
    }

    public function render()
    {
        return view('livewire.filters.filtered-models');
    }
}
