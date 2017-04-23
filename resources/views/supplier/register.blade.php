@extends('layouts.app')

@section('content')
    <body>
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de proveedor</div>
                    <div class="panel-body">

<!-- Inicio formulario -->
                    {!! Form::open(['method'=>'POST', 'action'=>'ClientController@create', 'onSubmit'=> 'return dv();','class' => 'form-horizontal']) !!}

                    {!! Form::token() !!}
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

    <script>
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