<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class DashboardNavigation extends Component
{
    public $section;

    public function changeSection(string $section)
    {
        $this->section = $section;
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-navigation');
    }
}
