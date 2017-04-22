@extends('layouts.app')
@section('content')
    <body class="box-header">
        <div class="panel">
            <div class="panel-heading" style="color: #fff; background-color: #3c8dbc;">Receta</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="info">
                                <td>{!! Form::label('name', 'Nombre:', [ 'class' => 'col-md-1 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        <label class="control-label text-capitalize" >{{$name}}</label>
                                        <input class="hidden" name="client_run" id="client_run" value="">{{$presc[1]}}</input>
                                        <input id="client_run" type="text" class="hidden" name="client_run" value="">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th style="text-align: center;">Ojo</th>
                                <th colspan="6" style="text-align: center;">Dioptría</th>
                            </tr>
                            <tr class="info" style="text-align: center;">
                                <td  style="width: 100px;"></td>
                                <td style="width: 100px;"></td>
                                <td style="width: 100px;">Esférico</td>
                                <td style="width: 100px;">Cilíndrico</td>
                                <td style="width: 100px;">Eje</td>
                                <td style="width: 100px;">Prisma</td>
                                <td style="width: 100px;">Base</td>
                                <td style="width: 100px;">D.P</td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="text-align: center; vertical-align: middle">Lejos</td>
                                <td>Derecho</td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_right_eye_sphere}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_right_eye_cyl}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_right_eye_axis}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_right_eye_prism}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_right_eye_base}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_right_eye_pd}}</label></td>
                            </tr>
                            <tr>
                                <td>Izquierdo</td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_left_eye_sphere}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_left_eye_cyl}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_left_eye_axis}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_left_eye_prism}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_left_eye_base}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->far_left_eye_pd}}</label></td>
                            </tr>
                            <tr class="info" style="text-align: center;">
                                <td  style="width: 100px;"></td>
                                <td  style="width: 100px;"></td>
                                <td  style="width: 100px;">Esférico</td>
                                <td  style="width: 100px;">Cilíndrico</td>
                                <td  style="width: 100px;">Eje</td>
                                <td  style="width: 100px;">Prisma</td>
                                <td  style="width: 100px;">Base</td>
                                <td  style="width: 100px;">D.P</td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="text-align: center; vertical-align: middle">Cerca</td>
                                <td>Derecho</td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_right_eye_sphere}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_right_eye_cyl}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_right_eye_axis}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_right_eye_prism}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_right_eye_base}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_right_eye_pd}}</label></td>
                            </tr>
                            <tr>
                                <td>Izquierdo</td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_left_eye_sphere}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_left_eye_cyl}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_left_eye_axis}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_left_eye_prism}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_left_eye_base}}</label></td>
                                <td><label class="form-control" style="text-align: center">{{ $presc->near_left_eye_pd}}</label></td>
                            </tr>
                            <tr>
                                <td> {!! Form::label('doctor_name', 'Médico', [ 'class' => 'col-md-1 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        <label class="form-control" style="text-align: left">{{ $presc->doctor_name}}</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{!! Form::label('frame', 'Armazón', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        <label class="form-control" style="text-align: left">Este atributo se debe agregar a la base de datos</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{!! Form::label('crystal', 'Cristales', [ 'class' => 'col-md-3 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        <label class="form-control" style="text-align: left">Este atributo se debe agregar a la base de datos</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{!! Form::label('observation', 'Observaciones', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        <label class="form-control" style="text-align: left">{{ $presc->observation}}</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="modal-footer">
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
        </div>
    </body>
@endsection
