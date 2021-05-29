<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty(){
        return Course::where('title','LIKE',"%".$this->search."%")
        ->where('status', Course::PUBLISHED)->take(8)->get();
    }
}
