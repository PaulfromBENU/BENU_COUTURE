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
    public $initial_load;
    public $applied_filters;

    public $paginate_pages_count;
    public $paginate_page;

    protected $listeners = ['filtersUpdated' => 'applyFilters', 'sortUpdated' => 'changeSorting'];

    public function mount()
    {
        $this->sort_direction = 'asc';
        $this->initial_load = 0;
        $this->paginate_page = 1;
    }

    public function loadInitialModels() //On init, with wire:init
    {
        $this->applyFilters($this->initial_filters);
        $this->initial_load = 1;
    }

    public function applyFilters($applied_filters)
    {
        $this->applied_filters = $applied_filters;
        //Initialize filtered models
        $this->filtered_models = collect([]);
        
        // Compute collection of filtered models in FiltersGenerator Trait (required to keep full object relationships)
        $this->filtered_models = $this->getFilteredCreations($applied_filters);

        $this->paginate_pages_count = intval(floor($this->filtered_models->count() / 12) + 1);
        
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
        //$this->sections_number = floor($this->filtered_models->count() / 6) + 1;

        $this->sections_number = 1;
        if (fmod($this->filtered_models->count(), 12) > 6) {
            $this->sections_number = 2;
        }

        for ($i=0; $i < $this->sections_number; $i++) { 
            if ($this->sort_direction == 'desc') {
                $this->displayed_models[$i] = $this->filtered_models->sortByDesc(function($creation){
                    return $creation->price;
                })->slice(($this->paginate_page - 1 + $i) * 6, 6)->values();
                // $this->filtered_models = $this->filtered_models->slice(($this->paginate_page - 1) * 12, 12);
            } else {
                $this->displayed_models[$i] = $this->filtered_models->sortBy(function($creation){
                    return $creation->price;
                })->slice(($this->paginate_page - 1 + $i) * 6, 6)->values();
            }
        }
    }

    public function changePage($page = "1")
    {
        if ($page == "" || $page == 'next') {
            if ($this->paginate_page < $this->paginate_pages_count) {
                $this->paginate_page ++;
            }
        } elseif ($page == 'previous') {
            if ($this->paginate_page > 0) {
                $this->paginate_page --;
            }
        } else {
            $this->paginate_page = intval($page);
        }

        $this->applyFilters($this->applied_filters); //Necessary to avoid models conversion to array
    }

    public function render()
    {
        return view('livewire.filters.filtered-models');
    }
}
