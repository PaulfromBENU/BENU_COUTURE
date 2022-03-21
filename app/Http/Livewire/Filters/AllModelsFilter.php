<?php

namespace App\Http\Livewire\Filters;

use Livewire\Component;
use Illuminate\Http\Request;

use App\Models\ModelFilter;

class AllModelsFilter extends Component
{
    public $initial_filters;
    public $filter_names;
    public $family;

    public $active_filters;
    public $sorting_order;

    protected $queryString = ['family' => ['except' => '']];

    public function mount(Request $request)
    {
        $this->sorting_order = 'asc';

        // Adapt family of products acccording to request
        // if (!isset($request->family) || $request->family == 'clothes') {
        //     $this->family = 'clothes';
        // } elseif (in_array($request->family, ['accessories', 'home'])) {
        //     $this->family = $request->family;
        // }

        $this->active_filters = $this->initial_filters;
    }

    public function toggleFilter($filter, $value)
    {
        if ($filter == 'families') {
            if (in_array($value, ['clothes', 'accessories', 'home'])) {
                $this->family = $value;
            }
        } else {
            if ($this->active_filters[$filter][$value] == '0') {
                $this->active_filters[$filter][$value] = 1;
            } else {
                $this->active_filters[$filter][$value] = 0;
            }
        }

        $this->sendFilters();
    }

    public function updateSorting(string $sort_order)
    {
        if (in_array($sort_order, ['asc', 'desc'])) {
            $this->sorting_order = $sort_order;
            $this->emit('sortUpdated', $this->sorting_order, $this->active_filters);
        }
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
