<div>
    @foreach ($section->lessons as $item)
        <article class="mt-4 card" x-data="{open:false}">
            <div class="card-body">
             @if ($lesson->id == $item->id)
                 <form wire:submit.prevent="update">
                     <div class="flex items-center">
                         <label class="w-32">Nome:</label>
                         <input wire:model="lesson.name" type="text" class="w-full rounded form-input">
                     </div>
                     @error('lesson.name')
                         <span class="text-sm text-red-500">{{$message}}</span>
                     @enderror
                     <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select wire:model="lesson.platform_id" class="w-full rounded form-input">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="flex items-center mt-4">
                        <label class="w-32">Url:</label>
                        <input wire:model="lesson.url" type="text" class="w-full rounded form-input">
                    </div>
                    @error('lesson.url')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex justify-end mt-4">
                        <button type="button" wire:click="cancel()" class="mr-2 btn btn-red">Cancelar</button>
                        <button type="submit" class="btn btn-blue">Atualizar</button>
                    </div>
                 </form>
             @else
             <header>
                <h1 class="cursor-pointer" x-on:click="open = !open"><i class="mr-1 text-blue-500 far fa-play-circle"></i> Lição: {{ $item->name }}</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">
                <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                <p class="text-sm">Link: <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer">{{ $item->url }}</a></p>
                <div class="mt-2">
                    <button wire:click="destroy({{ $item }})" class="btn btn-red">Apagar</button>
                    <button wire:click="edit({{ $item }})" class="btn btn-blue">Editar</button>
                </div>
                <div class="mt-2">
                    @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description'.$item->id))
                </div>
                <div class="mt-2">
                    @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources'.$item->id))
                </div>
             </div>                 
             @endif
            </div>
        </article>
    @endforeach
    <div class="mt-4" x-data="{ open:false }">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
          <i class="mr-2 text-2xl text-red-500 far fa-plus-square"></i>Adicionar novo lição
        </a>
        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold">Adicionar novo lição</h1>
                <div class="mb-4">
                    <div>
                        <div class="flex items-center">
                            <label class="w-32">Nome:</label>
                            <input wire:model="name" type="text" class="w-full rounded form-input">
                        </div>
                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                           <label class="w-32">Plataforma:</label>
                           <select wire:model="platform_id" class="w-full rounded form-input">
                               @foreach ($platforms as $platform)
                                   <option value="{{$platform->id}}">{{$platform->name}}</option>
                               @endforeach
                           </select>
                       </div>
                        <div class="flex items-center mt-4">
                           <label class="w-32">Url:</label>
                           <input wire:model="url" type="text" class="w-full rounded form-input">
                       </div>
                       @error('url')
                           <span class="text-sm text-red-500">{{$message}}</span>
                       @enderror
                       <div class="flex justify-end">
                        <button x-on:click="open = false" class="btn btn-red">Cancelar</button> 
                        <button class="ml-2 btn btn-blue" wire:click="store">Adicionar</button> 
                    </div>
                    </div>
                 </div>
            </div>
        </article>
    </div>
</div>
