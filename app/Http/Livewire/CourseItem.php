<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CourseItem extends Component
{
    public $course ;

    public function mount($course){
        $this->course = $course ;
    }

    public function render()
    {
        return view('livewire.course-item');
    }
}
