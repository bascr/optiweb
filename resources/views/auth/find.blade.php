@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Ingrese nombre de usuario de la cuenta</div>
                <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open(['method'=>'POST', 'action'=>'UserController@account', 'class' => 'form-horizontal']) !!}

                {!! Form::token() !!}
<!-- Buscar run -->
                    <div class="form-group {{$errors->has('username') ? 'has_error' : ''}}">
                        {!! Form::label('username', 'Nombre de usuario', [ 'class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-3">
                            {!! Form::text('username', old('username'), [ 'class' => 'form-control']) !!}
                            @if ($errors->has('username'))
                                <span class="help-block">
                                     <strong>{{ $errors->first('username') }}</strong>
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