@extends('layouts.app')

@section('content')
    <body>
        <div class="box-header">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registro de cliente</div>
                        <div class="panel-body">
<!-- Inicio formulario -->
                            {!! Form::open(['method'=>'POST', 'action'=>'ClientController@create', 'class' => 'form-horizontal']) !!}

                            {!! Form::token() !!}
 <!-- Campo run -->
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
<!-- Campo dígito -->
                                        <div class="col-md-1">
                                            {!! Form::text('digit', old('digit'), [ 'class' => 'form-control']) !!}
                                            @if ($errors->has('digit'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('digit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
<!-- Campo nombre -->
                                    <div class="form-group {{$errors->has('name') ? 'has_error' : ''}}">
                                        {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('name', old('name'), [ 'class' => 'form-control']) !!}
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
<!-- Campo apellido paterno -->
                                    <div class="form-group {{$errors->has('last_name') ? 'has_error' : ''}}">
                                        {!! Form::label('last_name', 'Apellido paterno', [ 'class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('last_name', old('last_name'), [ 'class' => 'form-control']) !!}
                                            @if ($errors->has('last_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
<!-- Campo apellido materno -->
                                    <div class="form-group {{$errors->has('second_last_name') ? 'has_error' : ''}}">
                                        {!! Form::label('second_last_name', 'Apellido materno', [ 'class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('second_last_name', old('second_last_name'), [ 'class' => 'form-control']) !!}
                                            @if ($errors->has('second_last_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('second_last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
<!-- Campo apellido dirección -->
                                    <div class="form-group {{$errors->has('address') ? 'has_error' : ''}}">
                                        {!! Form::label('address', 'Dirección', [ 'class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('address', old('address'), [ 'class' => 'form-control']) !!}
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
                                    <div class="form-group {{$errors->has('phone') ? 'has_error' : ''}}">
                                        {!! Form::label('phone', 'Teléfono', [ 'class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('phone', old('phone'), [ 'class' => 'form-control']) !!}
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
    </body>
@endsection
