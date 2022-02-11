<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

class AllModelsFilter extends Component
{
    public $initial_filters;
    public $filter_names;

    public $active_filters;

    public function mount()
    {
        $this->active_filters = $this->initial_filters;
    }

    public function toggleFilter($filter, $value)
    {
        if ($this->active_filters[$filter][$value] == '0') {
            $this->active_filters[$filter][$value] = 1;
        } else {
            $this->active_filters[$filter][$value] = 0;
        }
        // $filter_query = "filter_".$filter;
        // if ($this->$filter_query[$value] == '0') {
        //     $this->$filter_query[$value] = 1;
        // } else {
        //     $this->$filter_query[$value] = 0;
        // }

        $this->sendFilters();
    }

    public function sendFilters()
    {
        // $applied_filters = [
        //     'categories' => $this->filter_categories, 
        //     'types' => $this->filter_types, 
        //     'colors' => $this->filter_colors, 
        //     'prices' => $this->filter_prices, 
        //     'partners' => $this->filter_partners, 
        //     'shops' => $this->filter_shops];
        $this->emit('filtersUpdated', $this->active_filters);
    }

    public function render()
    {
        return view('livewire.filters.all-models-filter');
    }
}
