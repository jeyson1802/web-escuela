<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesStudents extends Component
{

    use AuthorizesRequests;
    use WithPagination;

    public $course, $search;

    public function mount(Course $course){
        $this->authorize('dicatated', $course);
        $this->course = $course;
    }

    public function render()
    {
        
        $students = $this->course->students()->where('name','LIKE','%'.$this->search.'%')->paginate(4);
        
        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor', ['data'=>$this->course]);
    }

    
    public function updatingSearch()
    {
        $this->reset('page');
    }
}
