<x-app-layout>
   <section class="py-12 mb-12 bg-gray-700">
       <div class="container grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure>
                 <img class="object-cover w-full h-60" src="{{ Storage::url($course->image->url)}}" alt="{{ $course->title }}">
            </figure>
            <div class="text-white">
              <h1 class="text-4xl">{{ $course->title }}</h1>
              <h2 class="mb-3 text-xl">{{ $course->subtitle }}</h2>
              <p class="mb-2"><i class="mr-2 fas fa-chart-line"></i>Nível: {{ $course->level->name }}</p>
              <p class="mb-2"><i class="mr-2 fas fa-tags"></i>Categoria: {{ $course->category->name }}</p>
              <p class="mb-2"><i class="mr-2 fas fa-users"></i>Matriculas:</p>
              <p><i class="fas fa-star"></i> Classificação: {{ $course->rating }}</p>
            </div>
       </div>
   </section>
   <div class="container grid grid-cols-1 gap-6 lg:grid-cols-3">
       <div class="order-2 lg:col-span-2 lg:oder-1">
           <section class="mb-12 card">
              <div class="card-body">
                <h1 class="mb-2 text-2xl font-bold">O vamos aprender</h1>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                    @foreach ($course->goals as $goal)
                        <li class="text-base text-gray-700"><i class="mr-2 text-gray-600 fas fa-check">{{ $goal->name }}</i></li>
                    @endforeach
                </ul>
              </div>
           </section>

           <section>
               <h1 class="mb-2 text-3xl font-bold">Mdulos</h1>
               @foreach ($course->sections as $section)
                   <article class="mb-4 shadow" @if ($loop->first)
                    x-data="{ open: true}"
                   @else
                   x-data="{ open: false}"
                   @endif>
                       <header class="px-4 py-2 bg-gray-200 border cursor-pointer boder-gray-200" x-on:click="open = !open">
                           <h1 class="text-lg font-bold text-gray-600">{{ $section->name }}</h1>
                       </header>
                       <div class="px-4 py-2 bg-white" x-show="open">
                           <ul class="grid grid-cols-1 gap-2">
                               @foreach ($section->lessons as $lesson)
                                <li class="text-base text-gray-700">
                                <i class="mr-2 text-gray-600 fas fa-play-circle"></i>{{ $lesson->name }}
                                </li>
                               @endforeach
                           </ul>
                       </div>
                   </article>
               @endforeach
           </section>
             
           <section>
            <h1 class="text-3xl font-bold">Requisitos</h1>
            <ul class="list-disc list-inside">
                @foreach ($course->requirements as $requirement)
                    <li class="text-base text-gray-700">
                        {{ $requirement->name }}
                    </li>
                @endforeach
            </ul>
           </section>
           <section>
            <h1 class="text-3xl font-bold">Descrição</h1>
               <div class="text-base text-gray-700">
                   {{ $course->description }}
               </div>
           </section>
        </div>
       <div class="order-1 lg:order-2">
           <section class="mb-4 card">
            <div class="card-body">
              <div class="flex">
                <img class="object-cover w-12 h-12 rounded-full shadow" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                <div class="ml-4">
                  <h1 class="text-lg font-bold text-gray-500">Prof: {{ $course->teacher->name }}</h1>
                  <a class="text-sm font-bold text-blue-700" href="">{{'@'.Str::slug($course->teacher->name) }}</a>
                </div>
              </div>
             @can('enrolled', $course)
               <a href="{{ route('courses.status', $course) }}" class="mt-4 btn btn-red btn-block">Continuar com o curso</a>
             @else
             <form action="{{ route('courses.enrolled', $course) }}" method="post">
                @csrf
                <button type="submit" class="mt-4 btn btn-red btn-block">Fazer este curso</button>
            </form>
             @endcan
            </div>
           </section>
           <aside class="hidden lg:block">
               @foreach ($similares as $similar)
                   <article class="flex mb-6">
                       <img class="object-cover w-40 h-32" src="{{ Storage::url($similar->image->url) }}" alt="{{ $similar->title }}">
                       <div class="ml-3 ">
                           <h1>
                               <a class="mb-3 font-bold text-gray-500" href="{{ route('courses.show', $similar) }}">{{ Str::limit($similar->title, 40) }}</a>
                           </h1>
                           <div class="flex items-center mb-2">
                            <img class="object-cover w-8 h-8 rounded-full shadow" src="{{ $similar->teacher->profile_photo_url }}" alt="{{ $similar->teacher->name }}">
                            <p class="ml-2 text-sm text-gray-700">{{ $similar->teacher->name }}</p>
                        </div>
                        <p class="text-sm">
                            <i class="text-yellow-400 fas fa-star"></i> {{ $similar->rating }}
                        </p>
                       </div>
                   </article>
               @endforeach
           </aside>
       </div>
   </div>
</x-app-layout>