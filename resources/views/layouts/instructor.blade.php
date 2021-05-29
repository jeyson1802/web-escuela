<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Content -->
            <div class="container grid grid-cols-5 gap-6 py-8">
                <aside>
                    <h1 class="mb-4 text-lg font-bold">Edição do curso</h1>
                    <ul class="text-sm text-gray-600">
                        <li class="pl-2 mb-1 leading-7 border-l-4 @routeIs('instructor.courses.edit', $data) border-indigo-400 @else border-transparent @endif">
                            <a href="{{ route('instructor.courses.edit', $data) }}">Informação do curso</a>
                        </li>
                        <li class="pl-2 mb-1 leading-7 border-l-4  @routeIs('instructor.courses.curriculum', $data) border-indigo-400 @else border-transparent @endif">
                            <a href="{{ route('instructor.courses.curriculum', $data) }}">Lições do curso</a>
                        </li>
                        <li class="pl-2 mb-1 leading-7 border-l-4  @routeIs('instructor.courses.goals', $data) border-indigo-400 @else border-transparent @endif">
                            <a href="{{ route('instructor.courses.goals', $data) }}">Metas do curso</a>
                        </li>
                        <li class="pl-2 mb-1 leading-7 border-l-4  @routeIs('instructor.courses.students', $data) border-indigo-400 @else border-transparent @endif">
                            <a href="{{ route('instructor.courses.students', $data) }}">Estudantes do curso</a>
                        </li>
                    </ul>
                    @switch($data->status)
                        @case(\App\Models\Course::DRAFT)
                            <form action="{{ route('instructor.courses.status', $data) }}" method="post">
                                @csrf
                                <button class="btn btn-red" type="submit">Solicitar revisão</button>
                            </form> 
                            @break
                        @case(\App\Models\Course::PUBLISHED)
                        <div class="mt-4 card">
                            <div class="card-body">
                                Este curso está em publicado
                            </div>
                        </div>
                            @break
                        @case(\App\Models\Course::REVISION)
                        <div class="mt-4 card">
                            <div class="card-body">
                                Este curso está em revisão
                            </div>
                        </div>
                       
                        @break                      
                    @endswitch
                </aside>
                <div class="col-span-4 card">
                    <main class="text-gray-600 card-body md-6">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
    </body>
</html>
