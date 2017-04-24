@extends('layouts.app')
<<<<<<< HEAD
@section('content')
    <body class="box-header">
        <div class="panel">
            <div class="panel-heading" style="color: #fff; background-color: #3c8dbc;">Receta</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="imp" class="table table-bordered">
                            <tr class="info">
                                <td>{!! Form::label('name', 'Nombre:', [ 'class' => 'col-md-1 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        <label class="control-label text-capitalize" >{{$name}}</label>
                                        <input class="hidden" name="client_run" id="client_run" value="{{$presc[1]}}">
=======
>>>>>>> 3fc7fea37be34257a83a5d12c731d7a427d90a0e

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff; background-color: #3c8dbc;">Receta</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="prescriptionTable" class="table table-bordered">
                                <tr class="info">
                                    <td style="min-width: 70px;">Nombre</td>
                                    <td colspan="7" class="text-capitalize">{{ $name }}</td>
                                </tr>
                                <tr>
                                    <th style="min-width: 70px;"></th>
                                    <th style="min-width:70px; text-align: center;">Ojo</th>
                                    <th colspan="6" style="text-align: center;">Dioptría</th>
                                </tr>
                                <tr class="info" style="text-align: center;">
                                    <td style="min-width: 70px;"></td>
                                    <td style="min-width: 70px;"></td>
                                    <td style="min-width: 70px;">Esférico</td>
                                    <td style="min-width: 70px;">Cilíndrico</td>
                                    <td style="min-width: 70px;">Eje</td>
                                    <td style="min-width: 70px;">Prisma</td>
                                    <td style="min-width: 70px;">Base</td>
                                    <td style="min-width: 70px;">D.P</td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="min-width:70px; text-align: center; vertical-align: middle">Lejos</td>
                                    <td style="min-width: 70px;" class="text-center">Derecho</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_right_eye_sphere}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_right_eye_cyl}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_right_eye_axis}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_right_eye_prism}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_right_eye_base}}</td>
                                    <td  style="min-width: 70px;" class="text-center">{{ $presc->far_right_eye_pd}}</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 70px;" class="text-center">Izquierdo</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_left_eye_sphere}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_left_eye_cyl}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_left_eye_axis}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_left_eye_prism}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_left_eye_base}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->far_left_eye_pd}}</td>
                                </tr>
                                <tr class="info" style="text-align: center;">
                                    <td style="min-width: 70px;"></td>
                                    <td style="min-width: 70px;"></td>
                                    <td style="min-width: 70px;">Esférico</td>
                                    <td style="min-width: 70px;">Cilíndrico</td>
                                    <td style="min-width: 70px;">Eje</td>
                                    <td style="min-width: 70px;">Prisma</td>
                                    <td style="min-width: 70px;">Base</td>
                                    <td style="min-width: 70px;">D.P</td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="min-width: 70px; text-align: center; vertical-align: middle">Cerca</td>
                                    <td style="min-width: 70px;" class="text-center">Derecho</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_right_eye_sphere}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_right_eye_cyl}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_right_eye_axis}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_right_eye_prism}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_right_eye_base}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_right_eye_pd}}</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 70px;" class="text-center">Izquierdo</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_left_eye_sphere}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_left_eye_cyl}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_left_eye_axis}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_left_eye_prism}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_left_eye_base}}</td>
                                    <td style="min-width: 70px;" class="text-center">{{ $presc->near_left_eye_pd}}</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 70px;">Médico</td>
                                    <td style="min-width: 70px;" colspan="7">{{ $presc->doctor_name}}</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 70px;">Armazón</td>
                                    <td style="min-width: 70px;" colspan="7">Este atributo se debe agregar a la base de datos</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 70px;">Cristales</td>
                                    <td style="min-width: 70px;" colspan="7">Este atributo se debe agregar a la base de datos</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 70px;">Observaciones</td>
                                    <td style="min-width: 70px;" colspan="7">{{ $presc->observation}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
<<<<<<< HEAD
                                <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>

=======
                            <a class="btn btn-primary" href="#" onclick="return xepOnline.Formatter.Format('prescriptionTable', {render:'download'});">Imprimir</a>
                            <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
>>>>>>> 3fc7fea37be34257a83a5d12c731d7a427d90a0e
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
