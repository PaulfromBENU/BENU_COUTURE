<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;

use App\Models\ModelFilter;

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

        $this->sendFilters();
    }

    public function sendFilters()
    {
        // Update active filters in DB, to be transferred to specific model page
        $stored_filters = ModelFilter::where('session_id', session('secret_id'))->first();
        $stored_filters->applied_filters = json_encode($this->active_filters);
        $stored_filters->save();

        $this->emit('filtersUpdated', $this->active_filters);
    }

    public function render()
    {
        return view('livewire.filters.all-models-filter');
    }
}
