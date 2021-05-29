@props(['image' => 'images/home/code-1839406_1920.jpg', 'title' =>'Dominando as tecnoçigias web com SIGA', 'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ratione aliquam explicabo amet doloribus saepe fugiat perferendis, error qui ipsum beatae enim, reprehenderit quidem, similique provident repellat mollitia cupiditate quis.'])
<section class="bg-cover" style="background-image: url({{ asset($image)}}) ;">
    <div class="mx-auto max-w-7 sm:px-6 lg:px-8 py-36">
    <div class="w-full md:w-2/4 lg:1/2">
            <h1 class="text-4xl font-bold text-white">{{ $title }}</h1>
            <p class="mt-2 text-lg text-white">{{ $message }}</p>
            @livewire('search')
        </div>  
    </div>
</section>