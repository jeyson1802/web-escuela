<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    
    public function __construct(){
        $this->middleware("can:Ler Curso")->only('index');
        $this->middleware("can:Criar Curso")->only('create','store');
        $this->middleware("can:Editar Curso")->only('edit','update','goals');
        $this->middleware("can:Apagar Curso")->only('destroy');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        return view('instructor.courses.create',compact('categories','levels','prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:courses',
            'subtitle'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'level_id'=>'required',
            'price_id'=>'required',
            'file'=>'image',
        ]);
        $course = Course::create($request->all());

        if($request->file('file')){
           $url =  Storage::put("courses", $request->file('file'));
           $course->image()->create([
               'url'=>$url
           ]);
        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('dicatated', $course);

        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        
        return view('instructor.courses.edit', compact('course','categories','levels','prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('dicatated', $course);

        $request->validate([
            'title'=>'required',
            'slug'=>sprintf('required|unique:courses,slug,%s',  $course->id),
            'subtitle'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'level_id'=>'required',
            'price_id'=>'required',
            'file'=>'image',
        ]);

        $course->update($request->all());
        if($request->file('file')){
            $url =  Storage::put("courses", $request->file('file'));
            if($course->image){
                Storage::delete($course->image->url);
                $course->image()->update([
                    'url'=>$url
                ]);
            }
            else{
                $course->image()->create([
                    'url'=>$url
                ]);
            }
         }
        return redirect()->route('instructor.courses.edit', $course);
    }

    public function goals(Course $course){

        $this->authorize('dicatated', $course);

        return view('instructor.courses.goals', compact('course'));
    }

    public function status(Course $course){

        $this->authorize('dicatated', $course);

        $course->status = Course::REVISION;
        $course->save();
        return back();
    }
}
