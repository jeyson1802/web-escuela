<div class="card">
    <div class="bg-gray-100 card-body" x-data="{open: false}">
        <header>
            <h1 class="cursor-pointer" x-on:click="open = !open">Recursos da lição</h1>
        </header>
        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
                <div class="flex items-center justify-between">
                    <p><i wire:click="download" class="mr-2 text-gray-500 cursor-pointer fas fa-download"></i> {{ $lesson->resource->url }}</p>
                    <i wire:click="destroy" class="text-red-500 cursor-pointer fas fa-trash"></i>
                </div>
            @else
            <form wire:submit.prevent="save">
                <div class="flex items-center">
                    <input wire:model="file" type="file" class="flex-1 form-input">
                    <button class="btn btn-blue">Salvar</button>
                </div>
                <div wire:loading wire:target="file" class="mt-1 font-bold text-blue-500">Carregando...</div>
                @error('file')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </form>
            @endif
        </div>
    </div>
</div>
