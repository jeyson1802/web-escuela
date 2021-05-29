<div>
   <article class="mt-2 card" x-data="{open: false}">
       <div class="bg-gray-100 card-body">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descrição da lição</h1>
            </header>
            <div x-show="open">
                <hr class="my-2"> 
                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <label for="description">Nome:</label>
                        <textarea wire:model="description.name" class="w-full form-input" placeholder="Atualizar descrição para a lição"></textarea>
                         @error('description.name')
                             <span class="text-sm text-red-500">{{ $message }}</span>
                         @enderror
                        <div class="flex justify-end">
                            <button wire:click="destroy" class="mr-2 btn btn-red" type="button">Apagar</button>
                            <button class="btn btn-blue" type="submit">Atualizar descrição</button>
                        </div>
                    </form>
                    @else
                    <div>
                        <label for="name">Nome:</label>
                        <textarea wire:model="name" class="w-full form-input" placeholder="Adicionar descrição para a lição"></textarea>
                         @error('name')
                             <span class="text-sm text-red-500">{{ $message }}</span>
                         @enderror
                        <div class="flex justify-end">
                            <button wire:click="store" class="btn btn-blue" type="button">Adicionar descrição</button>
                        </div>
                    </div>
                @endif
            </div>
       </div>
   </article>
</div>
