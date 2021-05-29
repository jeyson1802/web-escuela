<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use Livewire\WithPagination;

class CourseIndex extends Component
{

    use WithPagination;

    public $category_id = null;

    public $level_id = null;

    public function render()
    {

        $categories = Category::all();

        $levels = Level::all();

        $courses = Course::where('status','published')
        ->category( $this->category_id)
        ->level($this->level_id)
        ->latest('id')->paginate(8);

        return view('livewire.course-index', compact('courses','categories','levels'));
    }

    public function resetFilter(){
        $this->reset(['category_id','level_id']);
    }
}
