@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buscar cliente</div>
                <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open(['method'=>'POST', 'action'=>'PrescriptionController@find', 'class' => 'form-horizontal']) !!}

                {!! Form::token() !!}
 <!-- Buscar run -->
                    <div class="form-group {{$errors->has('run') ? 'has_error' : ''}}">
                        {!! Form::label('run', 'Run', [ 'class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-3">
                            {!! Form::text('run', old('run'), [ 'class' => 'form-control']) !!}
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