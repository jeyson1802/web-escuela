<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CourseCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
Route::redirect('/', 'instrutor/cursos');
Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CourseCurriculum::class)->middleware("can:Editar Curso")->name('courses.curriculum');

Route::get('courses/{course}/students', CoursesStudents::class)->middleware("can:Editar Curso")->name('courses.students');

Route::get('/cursos/{course}/goals',[ CourseController::class,'goals'])->name('courses.goals');

Route::post('/cursos/{course}/status',[ CourseController::class,'status'])->name('courses.status');
