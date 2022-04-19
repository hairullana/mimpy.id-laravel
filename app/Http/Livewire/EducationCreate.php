<?php

namespace App\Http\Livewire;

use App\Models\Education;
use Livewire\Component;

class EducationCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.education-create');
    }

    public function store(){
        $this->validate([
            'name' => ['min:5', 'max:30']
        ]);
        
        $education = Education::create([
            'name' => $this->name
        ]);

        $this->resetInput();

        $this->emit('educationStored', $education);
    }

    private function resetInput(){
        $this->name = null;
    }
}
