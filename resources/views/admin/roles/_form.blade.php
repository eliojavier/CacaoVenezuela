<div class="form-group">
    {!!Form::label('name','Rol')!!}
    {!!Form::text('name', old('name'), ['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
    {!!Form::label('display_name','Nombre a mostrar')!!}
    {!!Form::text('display_name', old('display_name'), ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('description','Descripción')!!}
    {!!Form::textarea('description', old('description'), ['class'=>'form-control'])!!}
</div>
