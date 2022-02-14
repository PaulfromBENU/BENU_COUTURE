<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

class ModelArticlesFilter extends Component
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
        $this->sendFilters();
    }

    public function sendFilters()
    {
        $this->emit('filtersUpdated', $this->active_filters);
    }

    public function render()
    {
        return view('livewire.filters.model-articles-filter');
    }
}
