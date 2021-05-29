<div>
   <h1 class="font-bold tetx-2xl">LIÇÕES DO CURSO</h1>
   <hr class="mt-2 mb-6">
   @foreach ($course->sections as $item)
       <article class="mb-6 card" x-data="{open:true}">
           <div class="bg-gray-100 card-body">
              @if($section->id == $item->id)
                <form wire:submit.prevent="update">
                    <input wire:model="section.name" type="text" class="w-full rounded form-input" placeholder="Adicionar um nova sessão">
                    @error('section.name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </form>
              @else 
              <header class="flex items-center justify-between">
                <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sessão</strong> {{ $item->name }}</h1>
                <div>
                    <i wire:click="edit({{$item}})" class="text-blue-500 cursor-pointer fas fa-edit"></i>
                    <i wire:click="destroy({{$item}})" class="text-red-500 cursor-pointer fas fa-eraser"></i>
                </div>
            </header>
            <div x-show="open">
                @livewire('instructor.course-lesson', ['section' => $item], key($item->id))
            </div>
            @endif
           </div>
       </article>
   @endforeach
   <div x-data="{ open:false }">
       <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
         <i class="mr-2 text-2xl text-red-500 far fa-plus-square"></i>Adicionar nova sessão
       </a>
       <article class="card" x-show="open">
           <div class="bg-gray-100 card-body">
               <h1 class="text-xl font-bold">Adicionar nova sessão</h1>
               <div class="mb-4">
                   <input wire:model="name" type="text" class="w-full rounded form-input" placeholder="Adicionar nova sessão">
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
               <div class="flex justify-end">
                   <button x-on:click="open = false" class="btn btn-red">Cancelar</button> 
                   <button class="ml-2 btn btn-blue" wire:click="store">Adicionar</button> 
               </div>
           </div>
       </article>
   </div>
</div>
