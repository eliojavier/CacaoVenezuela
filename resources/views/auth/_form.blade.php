<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nombre *') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'=>'Nombre', 'autofocus']) !!}
        </div>
        <div class="col-md-6 {{ $errors->has('last_name') ? ' has-error' : '' }}">
            {!! Form::label('last_name', 'Apellido *')!!}
            {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder'=>'Apellido']) !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'E-Mail *') !!}
            {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder'=>'E-Mail']) !!}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-6 {{ $errors->has('doc_id') ? ' has-error' : '' }}">
            {!! Form::label('doc_id', 'Cédula *') !!}
            {!! Form::text('doc_id', old('doc_id'), ['class' => 'form-control', 'placeholder'=>'Cédula']) !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Contraseña *') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            {!! Form::label('password_confirmation', 'Confirmar contraseña *') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-6 {{ $errors->has('birthday') ? ' has-error' : '' }}">
            {!! Form::label('birthday', 'Fecha de nacimiento *') !!}
            {!! Form::text('birthday', old('birthday'), ['id' => 'datepicker', 'class' => 'form-control',                                                                    'placeholder'=>'dd/mm/aaaa', 'autofocus', 'readonly']) !!}
        </div>
        <div class="col-md-6 {{ $errors->has('city_id') ? ' has-error' : '' }}">
            {!! Form::label('city_id', 'Estado *') !!}
            {!!Form::select('city_id', $cities, null, ['class' => 'form-control'])!!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
            {!! Form::label('phone', 'Teléfono *') !!}
            {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder'=> 'xxxx-xxx-xx-xx']) !!}
        </div>
        <div class="col-md-6 {{ $errors->has('size') ? ' has-error' : '' }}">
            {!! Form::label('size', 'Talla *') !!}
            {!!Form::select('size', $sizes, null, ['class' => 'form-control'])!!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-6 {{ $errors->has('twitter') ? ' has-error' : '' }}">
            {!! Form::label('twitter', 'Twitter') !!}
            {!! Form::text('twitter', old('twitter'), ['class' => 'form-control', 'placeholder'=> 'Twitter']) !!}
        </div>

        <div class="col-md-6 {{ $errors->has('instagram') ? ' has-error' : '' }}">
            {!! Form::label('instagram', 'Instagram') !!}
            {!! Form::text('instagram', old('instagram'), ['class' => 'form-control', 'placeholder'=> 'Instagram']) !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-6 {{ $errors->has('category') ? ' has-error' : '' }}">
        {!! Form::label('category', 'Categoría *') !!}
        {!!Form::select('category', $categories, null, ['class' => 'form-control col-md-6', "onChange"=>"showHideDiv()"])!!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div id="type_div" style="display:none" class="col-md-6 {{ $errors->has('type') ? ' has-error' : '' }}">
            {!! Form::label('type', 'Tipo *') !!}
            {!!Form::select('type', $types, null, ['class' => 'form-control'])!!}
        </div>
        <div id="student_professional_div" style="display:none" class="col-md-6 {{ $errors->has('academy_id') ? ' has-error' : '' }}">
            {!! Form::label('academy_id', 'Academia *') !!}
            {!!Form::select('academy_id', $academies, null, ['class' => 'form-control'])!!}
        </div>
    </div>
</div>

<script>
    function showHideDiv() {
        var x = $("#category").val();
        if (x == "Estudiante/Profesional") {
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
        else {
            $("#student_professional_div").hide();
            $("#type_div").hide();
//                show(document.getElementById('student_professional_div'));
//                show(document.getElementById('type_div'));
//                $("#student_professional_div").empty();
//                $("#type_div").empty();
        }
    }
</script>

@section('after-scripts-end')
    <script>
        $('#phone').mask('0000-000-00-00');

        $('#doc_id').mask('000000000');
    </script>
@endsection
