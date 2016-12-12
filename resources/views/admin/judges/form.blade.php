<div class="form-group">
    {!!Form::label('name','Nombre')!!}
    {!!Form::text('name', old('name'), ['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
    {!!Form::label('email','Correo electrónico')!!}
    {!!Form::text('email', old('email'), ['class'=>'form-control', 'required', 'email'])!!}
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!!Form::label('phone','Teléfono')!!}
    {!!Form::text('phone', old('phone'), ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}
    </div>
</div>

