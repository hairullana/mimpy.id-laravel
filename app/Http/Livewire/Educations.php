<?php

namespace App\Http\Livewire;

use App\Models\Education;
use Livewire\Component;

class Educations extends Component
{
    public $name;
    public $statusUpdate = false;
    
    protected $listeners = [
        'educationStored' => 'handleStored'
    ];
    
    public function render()
    {
        return view('livewire.educations', [
            'educations' => Education::orderBy('id', 'DESC')->get()
        ]);
    }

    public function getEducation($id){
        $this->statusUpdate = true;
        $education = Education::find($id);
        $this->emit('getEducation', $education);
    }

    public function handleStored($education){
        session()->flash('message', 'New education has been added!');
    }
}
