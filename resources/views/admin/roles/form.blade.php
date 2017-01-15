<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name','Rol')!!}
    @if($action == 'create')
        {!!Form::text('name', old('name'), ['class'=>'form-control'])!!}
    @else
        {!!Form::text('name', old('name'), ['class'=>'form-control', 'disabled'])!!}
    @endif
</div>

<div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
    {!!Form::label('display_name','Nombre a mostrar *')!!}
    {!!Form::text('display_name', old('display_name'), ['class'=>'form-control'])!!}
</div>

<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!!Form::label('description','Descripción *')!!}
    {!!Form::textarea('description', old('description'), ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
</div>
