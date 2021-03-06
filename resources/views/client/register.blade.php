@extends('layouts.app')

@section('content')
    <body>
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de cliente</div>
                    <div class="panel-body">

<!-- Inicio formulario -->
                        {!! Form::open(['method'=>'POST', 'action'=>'ClientController@create', 'onSubmit'=> 'return dv();','class' => 'form-horizontal']) !!}

                        {!! Form::token() !!}
<!-- Campo run -->
                                <div class="form-group {{$errors->has('run') ? 'has-error' : ''}} {{ $errors->has('digit') ? ' has-error' : '' }}">
                                    <div>
                                        {!! Form::label('run', 'Run', [ 'class' => 'col-md-4 control-label']) !!}
                                    </div>

                                    <div class="col-xs-6 col-md-4">
                                        {!! Form::text('run', old('run'), [ 'class' => 'col-md-4 form-control', 'maxlength' => '8', 'onkeypress' => 'return soloNumeros(event)']) !!}
                                        @if ($errors->has('run'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('run') }}</strong>
                                            </span>
                                        @endif
                                    </div>
<!-- Campo dígito -->
                                    <div class="col-xs-4 col-md-2">
                                        {!! Form::text('digit', old('digit'), [ 'class' => 'form-control', 'style'=>'width:40px', 'id' => 'digit', 'onkeypress' => 'return soloDigito(event)', 'maxlength' => '1']) !!}
                                        @if ($errors->has('digit'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('digit') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
<!-- Campo nombre -->
                                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                    {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'onkeypress' => 'return soloLetras(event)', 'maxlength' => '45']) !!}
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
<!-- Campo apellido paterno -->
                                <div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
                                    {!! Form::label('last_name', 'Apellido paterno', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('last_name', old('last_name'), [ 'class' => 'form-control', 'onkeypress' => 'return soloLetras(event)', 'maxlength' => '45']) !!}
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
<!-- Campo apellido materno -->
                                <div class="form-group {{$errors->has('second_last_name') ? 'has-error' : ''}}">
                                    {!! Form::label('second_last_name', 'Apellido materno', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('second_last_name', old('second_last_name'), [ 'class' => 'form-control', 'onkeypress' => 'return soloLetras(event)', 'maxlength' => '45']) !!}
                                        @if ($errors->has('second_last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('second_last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
<!-- Campo fecha de nacimiento -->
                                <div class="form-group {{$errors->has('birth_date') ? 'has-error' : ''}}">
                                    {!! Form::label('birth_date', 'Fecha de nacimiento', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('birth_date', old('birth_date'), [ 'class' => 'form-control', 'id'=>'datepicker']) !!}
                                        @if ($errors->has('birth_date'))
                                            <span class="help-block">
                                                   <strong>{{ $errors->first('birth_date') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
<!-- Campo apellido dirección -->
                                <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                                    {!! Form::label('address', 'Dirección', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'maxlength' => '255']) !!}
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                        @endif
                                    </div>
                                </div>
<!-- Droplist comuna -->
                                <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                    <label for="district" class="col-md-4 control-label">Comuna</label>

                                    <div class="col-md-6">

                                        <select id="district" class="form-control" name="district">
                                            <option value="0" selected>Seleccione comuna</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('district'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('district') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
<!-- Campo teléfono -->
                                <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                                    {!! Form::label('phone', 'Teléfono', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('phone', old('phone'), [ 'class' => 'form-control', 'onkeypress' => 'return soloNumeros(event)', 'maxlength' => '11']) !!}
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
<!-- Campo email -->
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
<!-- Botón registrar -->
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        {!! Form::submit('Registrar', [ 'class' => 'btn btn-primary' ]) !!}
                                    </div>
                                </div>
<!-- cierre formulario -->
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- set a date picker -->
    {!! Html::script('custom/datepicker.js') !!}

    <script>
        dv = function() {
            var run = document.getElementById('run');
            var digit = document.getElementById('digit');
            var dig;

            if(digit.value == "k"){
                dig = "K";
            }else{
                dig = digit.value;
            }

            var T = run.value;
            var M=0,S=1;
            for(;T;T=Math.floor(T/10))
                S=(S+T%10*(9-M++%6))%11;

            var fin = S?S-1:'K';

            if(fin.toString() == dig){

            }else{
                swal('Ingrese un run válido', 'para completar el formulario', 'warning');
                return false;
            }
        }

        function soloDigito(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " k0123456789";
            especiales = "8";

            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }

        function soloNumeros(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "0123456789";
            especiales = "8-37-39-46";

            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }

        function soloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";

            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }
    </script>

@endsection

