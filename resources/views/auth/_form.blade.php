<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'=>'Nombre', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    {!! Form::label('last_name', 'Apellido', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder'=>'Apellido', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'E-Mail', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder'=>'E-Mail', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('doc_id') ? ' has-error' : '' }}">
    {!! Form::label('doc_id', 'Cédula', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('doc_id', old('doc_id'), ['class' => 'form-control', 'placeholder'=>'Cédula', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'Contraseña', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    {!! Form::label('password_confirmation', 'Confirmar contraseña', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
    {!! Form::label('birthday', 'Fecha de nacimiento', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('birthday', old('birthday'), ['id' => 'datepicker', 'class' => 'form-control',                                                                    'placeholder'=>'dd/mm/aaaa', 'autofocus', 'readonly']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Teléfono', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder'=> 'Teléfono', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
    {!! Form::label('city_id', 'Estado', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!!Form::select('city_id', $cities, null, ['class' => 'form-control col-md-6'])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Dirección', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder'=> 'Dirección', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
    {!! Form::label('twitter', 'Twitter', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('twitter', old('twitter'), ['class' => 'form-control', 'placeholder'=> 'Twitter', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
    {!! Form::label('instagram', 'Instagram', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::text('instagram', old('instagram'), ['class' => 'form-control', 'placeholder'=> 'Instagram', 'autofocus']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
    {!! Form::label('size', 'Talla', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!!Form::select('size', $sizes, null, ['class' => 'form-control col-md-6'])!!}
    </div>
</div>

<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
    {!! Form::label('category', 'Categoría', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!!Form::select('category', $categories, null, ['class' => 'form-control col-md-6', "onChange"=>"showHideDiv()"])!!}
    </div>
</div>

<div id="type_div" style="display:none" class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    {!! Form::label('type', 'Tipo', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!!Form::select('type', $types, null, ['class' => 'form-control col-md-6'])!!}
    </div>
</div>

<div id="student_professional_div" style="display:none" class="form-group{{ $errors->has('academy_id') ? ' has-error' : '' }}">
    {!! Form::label('academy_id', 'Academia', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!!Form::select('academy_id', $academies, null, ['class' => 'form-control col-md-6'])!!}
    </div>
</div>

    <script>
        function showHideDiv()
        {
            var x = $("#category").val();
            if (x == "Estudiante/Profesional")
            {
                $("#student_professional_div").show();
                $("#type_div").show();

                {{--$("#type_div").append('{!! Form::label('type', 'Tipo', ['class' => 'col-md-4 control-label']) !!}' +--}}
                        {{--'<div class="col-md-6">' +--}}
                        {{--'{!!Form::select('type', $types, null, ['class' => 'form-control col-md-6'])!!}' +--}}
                        {{--'</div>');--}}

                {{--$("#student_professional_div").append('{!! Form::label('academy_id', 'Academia', ['class' => 'col-md-4 control-label']) !!}' +--}}
                        {{--'<div class="col-md-6">' +--}}
                        {{--'{!!Form::select('academy_id', $academies, null, ['class' => 'form-control col-md-6'])!!}' +--}}
                        {{--'</div>');--}}
            }
            else
            {
                $("#student_professional_div").hide();
                $("#type_div").hide();
//                show(document.getElementById('student_professional_div'));
//                show(document.getElementById('type_div'));
//                $("#student_professional_div").empty();
//                $("#type_div").empty();
            }
        }
    </script>
