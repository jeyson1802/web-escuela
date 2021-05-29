<x-app-layout>
    <x-jet-banners image="images/home/home.jpg"/>
    <section class="mt-24">
        <h1 class="mb-6 text-3xl text-center text-gray-600">CONTEUDO</h1>
        <div class="container grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <article>
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src="{{ asset('images/home/laptop-5842509_640.jpg') }}" alt="image">
                </figure>
                <header class="mt-2">
                    <h1 class="text-xl text-center text-gray-700">Cursos e projetos</h1>
                </header>
                <p class="text-sm text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem, nisi...
                </p>
            </article>
            <article>
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src="{{ asset('images/home/laptop-336369_640.jpg') }}" alt="image">
                </figure>
                <header class="mt-2">
                    <h1 class="text-xl text-center text-gray-700">Cursos e projetos</h1>
                </header>
                <p class="text-sm text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem, nisi...
                </p>
            </article>
            <article>
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src="{{ asset('images/home/student-849825_640.jpg') }}" alt="image">
                </figure>
                <header class="mt-2">
                    <h1 class="text-xl text-center text-gray-700">Cursos e laravel</h1>
                </header>
                <p class="text-sm text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem, nisi...
                </p>
            </article>
            <article>
                <figure>
                    <img class="object-cover w-full rounded-xl h-36" src="{{ asset('images/home/woman-792162_640.jpg') }}" alt="image">
                </figure>
                <header class="mt-2">
                    <h1 class="text-xl text-center text-gray-700">Cursos e blogs</h1>
                </header>
                <p class="text-sm text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem, nisi...
                </p>
            </article>
        </div>
    </section>

    <section class="py-12 mt-24 bg-gray-700">
          <h1 class="text-3xl text-center text-white">Não sabes qual curso esta procurando?</h1>
          <p class="text-center text-white">
              Ir para o catalogo de cursos por categoria ou nivel
          </p>
          <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index') }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Catalago de cursos</a>
          </div>
    </section>

    <section class="mt-24">
        <h1 class="text-3xl text-center text-black">Últimos cursos</h1>
        <p class="mb-6 text-sm text-center text-gray-500">Trabalhe duro pra aprender todos os cursos</p>
        <div class="grid grid-cols-1 px-4 mx-auto gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-w-7xl sm:px-6 lg:px-8">
       
            @foreach ($courses as $course)
            <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>