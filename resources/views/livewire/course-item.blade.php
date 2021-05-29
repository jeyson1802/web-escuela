<article class="overflow-hidden bg-white rounded shadow-lg">
   <img class="object-cover w-full h-36" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
    <div class="px-6 py-4">
        <h1 class="mb-2 text-xl leading-6 text-gray-700">{{ Str::limit($course->title, 40) }}</h1>
        <p class="text-sm text-gray-500 mb 2">Prof: {{ $course->teacher->name }}</p>
        <div class="flex">
        <ul class="flex text-sm">
            <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow':'gray'}}-400"></i></li>
            <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow':'gray'}}-400"></i></li>
            <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow':'gray'}}-400"></i></li>
            <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow':'gray'}}-400"></i></li>
            <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow':'gray'}}-400"></i></li>
        </ul>
        <p class="text-sm text-gray-500">
            <i class="fas fa-users"></i> ( {{ $course->students_count }} )
        </p>
        </div>
        <a href="{{ route('cousers.show', $course) }}" class="btn btn-blue">Máis detalhes</a>
    </div>
</article>
