<div class="mt-4">
    {!! Form::label("title", 'Title the course') !!}
    {!! Form::text("title", null, ['class'=>form_class($errors, 'title')]) !!}
    @include('includes.erros',['name'=>'title'])
</div>
<div class="mt-4">
    {!! Form::label("slug", 'Slug the course') !!}
    {!! Form::text("slug", null, ['class'=>form_class($errors, 'slug'), 'readonly'=>'readonly']) !!}
    @include('includes.erros',['name'=>'slug'])
</div>
<div class="mt-4">
    {!! Form::label("subtitle", 'Sub Title the course') !!}
    {!! Form::text("subtitle", null, ['class'=>form_class($errors, 'subtitle')]) !!}
    @include('includes.erros',['name'=>'subtitle'])
</div>
<div class="mt-4">
    {!! Form::label("description", 'Sub Title the course') !!}
    {!! Form::textarea("description", null, ['class'=>form_class($errors, 'description')]) !!}
    @include('includes.erros',['name'=>'description'])
</div>
<div class="grid grid-cols-3 gap-6 mt-4">
    <div>
        {!! Form::label("category_id", "Category") !!}
        {!! Form::select("category_id", $categories, null, ['class'=>'form-input w-full block mt-1']) !!}
    </div>
    <div>
        {!! Form::label("level_id", "Level") !!}
        {!! Form::select("level_id", $levels, null, ['class'=>'form-input w-full block mt-1']) !!}
    </div>
    <div>
        {!! Form::label("price_id", "Price") !!}
        {!! Form::select("price_id", $prices, null, ['class'=>'form-input w-full block mt-1']) !!}
    </div>
</div>
<h1 class="mt-8 mb-2 text-2xl font-bold">{{ __('Image the course') }}</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
       @isset($course->image)
            <img id="picture" class="w-full h-64 bg-center bg-cover" src="{{ Storage::url($course->image->url) }}" alt="{{$course->name}}">
       @else
            <img id="picture" class="w-full h-64 bg-center bg-cover" src="{{ asset('images/noPhotoFound.png') }}" alt="no Photo Found">
       @endisset
    </figure>
    <div>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo dignissimos ea atque, necessitatibus impedit voluptatum similique eaque, est voluptatibus maiores alias provident eos voluptates tempora. Est doloremque exercitationem autem sunt?</p>
        {!! Form::file("file", ['class'=>form_class($errors, 'file'),'id'=>'file', 'accept'=>'image/*']) !!}
        @include('includes.erros',['name'=>'file'])
    </div>
</div>
