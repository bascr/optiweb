@extends('layouts.app')

@section('content')
    <body>
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Cliente</div>
                    <div class="panel-body">

<!-- Inicio formulario -->

<!-- Campo run -->
                                <div class="form-group ">
                                    <div>
                                        {!! Form::label('run', 'Run', [ 'class' => 'col-md-4 control-label']) !!}
                                    </div>

                                    <div class="col-xs-6 col-md-4">
                                        <label class="form-control" style="text-align: left">{{ $client->run}}</label>
                                    </div>
<!-- Campo dígito -->
                                    <div class="col-xs-4 col-md-2">
                                        <label class="form-control" style="text-align: left">{{ $client->digit}}</label>
                                    </div>
                                </div>
<!-- Campo nombre -->
                                <div class="form-group">
                                    {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <label class="form-control text-capitalize" style="text-align: left">{{ $client->name}}</label>
                                    </div>
                                </div>
<!-- Campo apellido paterno -->
                                <div class="form-group">
                                    {!! Form::label('last_name', 'Apellido paterno', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <label class="form-control text-capitalize" style="text-align: left">{{ $client->last_name}}</label>
                                    </div>
                                </div>
<!-- Campo apellido materno -->
                                <div class="form-group">
                                    {!! Form::label('second_last_name', 'Apellido materno', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <label class="form-control text-capitalize" style="text-align: left">{{ $client->second_last_name}}</label>
                                    </div>
                                </div>
<!-- Campo apellido dirección -->
                                <div class="form-group">
                                    {!! Form::label('address', 'Dirección', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <label class="form-control text-capitalize" style="text-align: left">{{ $client->address}}</label>
                                    </div>
                                </div>
<!-- Campo fecha de nacimiento -->
                                <div class="form-group">
                                    {!! Form::label('birt_date', 'Fecha de nacimiento', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <label class="form-control text-capitalize" style="text-align: left">{{ $client->birt_date}}</label>
                                    </div>
                                </div>
<!-- Droplist comuna -->
                                <div class="form-group">
                                    <label for="district" class="col-md-4 control-label">Comuna</label>
                                        <div class="col-md-6">
                                            <?php
                                                foreach ($districts as $district){
                                                    if($client->district_id == $district->id){
                                                        $comuna = $district->name;
                                                    }
                                                }
                                            ?>
                                             <label class="form-control text-capitalize" style="text-align: left">{{$comuna}}</label>
                                        </div>
                                </div>
<!-- Campo teléfono -->
                                <div class="form-group">
                                    {!! Form::label('phone', 'Teléfono', [ 'class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <label class="form-control" style="text-align: left">{{ $client->phone}}</label>
                                    </div>
                                </div>
<!-- Campo email -->
                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                    <div class="col-md-6">
                                        <label class="form-control" style="text-align: left">{{ $client->email}}</label>
                                    </div>
                                </div>
<!-- Botón registrar -->
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
                                    </div>
                                </div>
<!-- cierre formulario -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

