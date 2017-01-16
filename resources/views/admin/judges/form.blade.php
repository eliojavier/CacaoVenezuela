<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name','Nombre *')!!}
    {!!Form::text('name', old('name'), ['class'=>'form-control'])!!}
</div>

<div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
    {!!Form::label('last_name','Apellido *')!!}
    {!!Form::text('last_name', old('last_name'), ['class'=>'form-control'])!!}
</div>

<div class="form-group {{ $errors->has('doc_id') ? ' has-error' : '' }}">
    {!!Form::label('doc_id','Cédula *')!!}
    {!!Form::text('doc_id', old('doc_id'), ['class'=>'form-control'])!!}
</div>

<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    {!!Form::label('email','Correo electrónico *')!!}
    {!!Form::text('email', old('email'), ['class'=>'form-control'])!!}
</div>

<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} ">
    {!!Form::label('phone','Teléfono *')!!}
    {!!Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'xxxx-xxx-xx-xx'])!!}
</div>
<div class="form-group">
    <div class="col-md-12 text-center">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    </div>
</div>

@section('after-scripts-end')
    <script>
        $('#phone').mask('0000-000-00-00');
        $('#doc_id').mask('000000000');
    </script>
@endsection