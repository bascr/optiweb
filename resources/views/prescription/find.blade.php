@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Seleccione un cliente</div>
                <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open( array('url' => '/prescription/find/', 'method' => 'GET')) !!}

                {{--{!! Form::token() !!}--}}
 <!-- Buscar run -->
                    <div class="form-group {{$errors->has('run') ? 'has_error' : ''}}">
                        {!! Form::label('run', 'Run', [ 'class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-3">
                            {!! Form::text('run', old('run'), [ 'class' => 'form-control', 'placeholder' => 'sin guión ni dígito', 'maxlength' => '8', 'onkeypress' => 'return soloNumeros(event)']) !!}
                            @if ($errors->has('run'))
                                <span class="help-block">
                                     <strong>{{ $errors->first('run') }}</strong>
                                </span>
                            @endif
                        </div>
<!-- Boton buscar -->
                        <div class="col-md-1">
                            <div class="col-md-6 col-md-offset-8">
                                {!! Form::submit('Buscar', [ 'class' => 'btn btn-primary' ]) !!}
                            </div>
                        </div>
                    </div>
<!-- cierre formulario -->
                 {!! Form::close() !!}

                </div>
                </div>
            </div>
        </div>
    </body>
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

</script>