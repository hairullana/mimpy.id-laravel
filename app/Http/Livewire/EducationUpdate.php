<?php

namespace App\Http\Livewire;

use App\Models\Education;
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

    public function update(){
        if ($this->educationId){
            $education = Education::find($this->educationId);
            $education->update([
                'name' => $this->name
            ]);

            $this->resetInput();

            $this->emit('educationUpdated', $education);
        }
    }

    private function resetInput(){
        $this->name = null;
    }
}
