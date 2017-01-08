<div class="form-group">
    {!!Form::label('name','Nombre *')!!}
    {!!Form::text('name', old('name'), ['class'=>'form-control'])!!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!!Form::label('last_name','Apellido *')!!}
    {!!Form::text('last_name', old('last_name'), ['class'=>'form-control'])!!}
    @if ($errors->has('last_name'))
        <span class="help-block">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!!Form::label('email','Correo electrónico *')!!}
    {!!Form::text('email', old('email'), ['class'=>'form-control'])!!}
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!!Form::label('phone','Teléfono *')!!}
    {!!Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'xxxx-xxx-xx-xx'])!!}
</div>
    @if ($errors->has('phone'))
        <span class="help-block">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif

<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
</div>

@section('after-scripts-end')
    <script>
        $('#phone').mask('0000-000-00-00');
    </script>
@endsection