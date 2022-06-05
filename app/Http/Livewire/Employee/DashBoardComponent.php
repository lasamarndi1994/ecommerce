<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class DashBoardComponent extends Component
{
    public function render()
    {
        return view('livewire.employee.dash-board-component')
        ->layout('layouts.admin-app');
    }
}
