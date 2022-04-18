<?php

namespace App\Http\Livewire;

use App\Models\Education;
use Livewire\Component;

class Educations extends Component
{
    public function render()
    {
        return view('livewire.educations', [
            'educations' => Education::get()
        ]);
    }
}
