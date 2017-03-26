@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"  style="padding: 1%">
                <div class="panel-heading">Registro de recetas</div>
                <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open(['method'=>'POST', 'action'=>'PrescriptionController@find', 'class' => 'form-horizontal']) !!}

                {!! Form::token() !!}
<!-- Nombre cliente -->
                    <div class="form-group {{$errors->has('run') ? 'has_error' : ''}}">
                        {!! Form::label('run', 'Nombre', [ 'class' => 'col-md-1 control-label']) !!}
                        <div class="col-md-6">
                            <label class="control-label">Rellenar con Nombre del paciente</label>
                           <!-- {!! Form::label('completar con nombre del cliente', old('run'), [ 'class' => 'form-control']) !!} -->
                            @if ($errors->has('run'))
                                <span class="help-block">
                                     <strong>{{ $errors->first('run') }}</strong>
                                </span>
                            @endif
                        </div>
<!-- Inicio receta -->
                        <div class="panel panel-default"  style="background-color:#f5f5f5"> <!-- inicio div receta -->

<!-- Vision de lejos -->
    <!-- Ojo derecho -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label">Ojo</label></div>
                                <div class="col-md-8"><label for="email" class="col-md-4 control-label">Dioptria</label></div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Esferico</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Cilindrico</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Eje</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Prisma</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Base</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">D.P</label></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label">Derecho</label></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                </div>
                            </div>
                        </div>
    <!-- Fin derecho -->
    <!-- Ojo izquierdo -->
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label">Lejos</label></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label">Izquierdo</label></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                </div>
                            </div>
                        </div>
    <!-- Fin izquierdo -->
<!-- Fin vision de lejos -->
<!-- Vision de cerca -->
<!-- Ojo derecho -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                <div class="col-md-8"><label for="email" class="col-md-4 control-label"></label></div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Esferico</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Cilindrico</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Eje</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Prisma</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">Base</label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label">D.P</label></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label">Derecho</label></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                </div>
                            </div>
                        </div>
<!-- Fin derecho -->
<!-- Ojo izquierdo -->
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label">Cerca</label></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label for="email" class="col-md-4 control-label"></label></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"><label for="email" class="col-md-4 control-label">Izquierdo</label></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                    <div class="col-md-2"><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"></div>
                                </div>
                            </div>
                        </div>
<!-- Fin izquierdo -->
<!-- Fin vision de cerca -->
<!-- Nombre medico -->
                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::label('run', 'Médico', [ 'class' => 'col-md-1 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('run', old('run'), [ 'class' => 'form-control']) !!}
                                    @if ($errors->has('run'))
                                        <span class="help-block">
                                     <strong>{{ $errors->first('run') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

<!-- Armazon y cristales -->
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    {!! Form::label('run', 'Armazón', [ 'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('run', old('run'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('run'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('run') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {!! Form::label('run', 'Cristales', [ 'class' => 'col-md-3 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('run', old('run'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('run'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('run') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
<!-- Observaciones -->
                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::label('run', 'Observaciones', [ 'class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('run', old('run'), [ 'class' => 'form-control']) !!}
                                    @if ($errors->has('run'))
                                        <span class="help-block">
                                     <strong>{{ $errors->first('run') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        </div> <!-- fin div receta -->

<!-- Boton ingresar -->
                        <div class="col-md-12">
                            <div class="col-md-6 col-md-offset-10">
                                {!! Form::submit('Ingresar', [ 'class' => 'btn btn-primary' ]) !!}
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