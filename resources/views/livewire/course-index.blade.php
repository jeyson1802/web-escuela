<div>
    <div class="py-4 mb-16 bg-gray-200">
        <div class="center-content">
          <button class="h-12 px-4 text-gray-700 bg-white rounded-lg shadow" wire:click="resetFilter">
            <i class="text-sm fab fa-buffer"></i> Todos os cursos
          </button>
          <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="relative inline-block text-left" x-data="{open:false}">
                <div> 
                    <button type="button" class="h-12 px-4 text-gray-700 bg-white rounded-lg shadow" x-on:click="open = true">
                        <i class="text-sm fas fa-tags"></i> Categorias<i class="ml-2 mr-2 text-sm fas fa-angle-down"></i>
                    </button>
                    </div>
                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" x-show="open"  @click.away="open = false" @close.stop="open = false">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                           @foreach ($categories as $category)
                            <a class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 hover:text-gray-900" role="menuitem" wire:click="$set('category_id', {{ $category->id }})" x-on:click="open=false">{{ $category->name }}</a>
                           @endforeach
                        </div>
                </div>
            </div> 
     <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="relative inline-block mr-4 text-left" x-data="{open:false}">
                <div> 
                    <button type="button" class="h-12 px-4 text-gray-700 bg-white rounded-lg shadow" x-on:click="open = true">
                        <i class="text-sm fas fa-tags"></i> Nivel<i class="ml-2 mr-2 text-sm fas fa-angle-down"></i>
                    </button>
                    </div>
                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" x-show="open"  @click.away="open = false" @close.stop="open = false">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            @foreach ($levels as $level)
                            <a class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 hover:text-gray-900"  wire:click="$set('level_id', {{ $level->id }})" x-on:click="open=false">{{ $level->name }}</a>
                           @endforeach
                        </div>
                </div>
            </div> 
        </div>
    </div>

    <div class="grid grid-cols-1 px-4 mx-auto gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-w-7xl sm:px-6 lg:px-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>
    <div class="container mt-4 mb-8 max-w-7xl">
        {{ $courses->links() }}
    </div>
</div>
