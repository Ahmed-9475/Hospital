<?php

namespace App\Livewire\GroupServices;

use App\Models\Service;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.group-services.index',['test'=>Service::all()]);
    }
}
