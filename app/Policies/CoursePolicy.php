<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function enrolled(User $user, Course $course){
      return $course->students->contains($user->id);
    }

    public function published(?User $user, Course $course)
    {
       return $course->status == Course::PUBLISHED;
    }
    
    public function dicatated(User $user, Course $course)
    {
       return $course->user_id == $user->id;
    }
}
