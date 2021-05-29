<div class="form-group">
    {!! Form::label("name", "Nome") !!}
    {!! Form::text("name", null, ["class"=>"form-control","placeholder"=>"Escrever um nome"]) !!}
@error('name')
    <small class="text-danger">
        <strong>{{ $message }}</strong>
    </small>
@enderror
</div>
<div class="form-group">
    <strong>Permissões</strong><br>
    @error('permissions')
    <small class="text-danger">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
    @foreach ($permissions as $permission)
    <div class="block">
        <label>
            {!! Form::checkbox("permissions[]", $permission->id, null, ["class"=>"mr-1"]) !!}
            {{ $permission->name }}
        </label>
    </div>
    @endforeach
</div>