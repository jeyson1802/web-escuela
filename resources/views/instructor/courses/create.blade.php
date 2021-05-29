<x-app-layout>
    <div class="container py-8">
        <div class="col-span-4 card">
            <div class="text-gray-600 card-body md-6">
                <h1 class="text-2xl font-bold">INFORMAÇÕES DO CURSO</h1>
                <hr class="mt-2 mb-6">
                {!! Form::open(['route'=>'instructor.courses.store','files'=>true,'autocomplete'=>'off']) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                @include('instructor.courses.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit("Create new course", ['class'=>'btn btn-blue cursor-pointer']) !!}
                 </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js')}}"></script>
    </x-slot>
</x-app-layout>