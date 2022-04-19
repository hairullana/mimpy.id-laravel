<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EducationUpdate extends Component
{
    public $name;
    public $educationId;

    protected $listeners = [
        'getEducation' => 'showEducation'
    ];

    public function render()
    {
        return view('livewire.education-update');
    }

    public function showEducation($education){
        $this->name = $education['name'];
        $this->educationId = $education['id'];
    }
}
