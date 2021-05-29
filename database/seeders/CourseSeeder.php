<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Image;
use App\Models\Requirement;
use App\Models\Goal;
use App\Models\Audience;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Description;
use App\Models\User;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $courses =  Course::factory(40)->create();
      foreach ($courses as $course) {
         $user = [];
         for ($i=0; $i < rand(5,12); $i++) { 
            $user[] = User::all()->random()->id;
         }

         $course->students()->attach($user);

         Image::factory(1)->create([
            'imageable_id'=>$course->id,
            'imageable_type'=>Course::class
         ]);
         Requirement::factory(4)->create([
            'course_id'=>$course->id
         ]);
         
         Goal::factory(4)->create([
            'course_id'=>$course->id
         ]);
         
         Audience::factory(4)->create([
            'course_id'=>$course->id
         ]);
         
         $sections = Section::factory(4)->create([
            'course_id'=>$course->id
         ]);

         foreach ($sections as $section) {
            $lessons =  Lesson::factory(rand(4, 9))->create(['section_id'=>$section->id]);

             foreach ($lessons as $lesson) {
               Description::factory(rand(4, 9))->create([
                    'lesson_id'=>$lesson->id
                 ]);
             }
         }
      }
    }
}
