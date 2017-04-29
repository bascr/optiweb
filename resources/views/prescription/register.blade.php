@extends('layouts.app')

@section('content')
<body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de recetas</div>
            <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open(['method'=>'POST', 'action'=>'PrescriptionController@create', 'onSubmit'=> 'return validaForm();' , 'class' => 'form-horizontal'])!!}

                {!! Form::token() !!}
<!-- inicio tabla -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="info">
                                <td style="min-width: 70px;">{!! Form::label('name', 'Nombre:', [ 'class' => 'col-md-1 control-label']) !!}</td>
                                <td style="min-width: 70px;" colspan="7">
                                    <div>
                                        <label class="control-label text-capitalize" >{{ $client -> name . " " . $client -> last_name . " " . $client -> second_last_name }}</label>
                                        <input class="hidden" name="client_run" id="client_run" value="{{ $client->run }}">
                                        @if ($errors->has('client_run'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('client_run') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="min-width: 70px;"></th>
                                <th style="text-align: center;">Ojo</th>
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
                                <td rowspan="2" style="text-align: center; vertical-align: middle">Lejos</td>
                                <td style="min-width: 70px;">Derecho</td>
                                <td style="min-width: 70px;"><input id="far_right_eye_sphere" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_right_eye_sphere" value="{{ old('far_right_eye_sphere') }}"></td>
                                <td style="min-width: 70px;"><input id="far_right_eye_cyl" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_right_eye_cyl" value="{{ old('far_right_eye_cyl') }}"></td>
                                <td style="min-width: 70px;"><input id="far_right_axis" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_right_axis" value="{{ old('far_right_axis') }}"></td>
                                <td style="min-width: 70px;"><input id="far_right_prism" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_right_prism" value="{{ old('far_right_prism') }}"></td>
                                <td style="min-width: 70px;"><input id="far_right_base" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_right_base" value="{{ old('far_right_base') }}"></td>
                                <td style="min-width: 70px;"><input id="far_right_pd" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_right_pd" value="{{ old('far_right_pd') }}"></td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">Izquierdo</td>
                                <td style="min-width: 70px;"><input id="far_left_eye_sphere" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_left_eye_sphere" value="{{ old('far_left_eye_sphere') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_eye_cyl" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_left_eye_cyl" value="{{ old('far_left_eye_cyl') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_axis" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_left_axis" value="{{ old('far_left_axis') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_prism" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_left_prism" value="{{ old('far_left_prism') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_base" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_left_base" value="{{ old('far_left_base') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_pd" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_left_pd" value="{{ old('far_left_pd') }}"></td>
                            </tr>
                            <tr class="info" style="text-align: center;">
                                <td  style="min-width: 70px;"></td>
                                <td  style="min-width: 70px;"></td>
                                <td  style="min-width: 70px;">Esférico</td>
                                <td  style="min-width: 70px;">Cilíndrico</td>
                                <td  style="min-width: 70px;">Eje</td>
                                <td  style="min-width: 70px;">Prisma</td>
                                <td  style="min-width: 70px;">Base</td>
                                <td  style="min-width: 70px;">D.P</td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="text-align: center; vertical-align: middle">Cerca</td>
                                <td style="min-width: 70px;">Derecho</td>
                                <td style="min-width: 70px;"><input id="near_right_eye_sphere" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_right_eye_sphere" value="{{ old('near_right_eye_sphere') }}"></td>
                                <td style="min-width: 70px;"><input id="near_right_eye_cyl" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_right_eye_cyl" value="{{ old('near_right_eye_cyl') }}"></td>
                                <td style="min-width: 70px;"><input id="near_right_axis" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_right_axis" value="{{ old('near_right_axis') }}"></td>
                                <td style="min-width: 70px;"><input id="near_right_prism" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_right_prism" value="{{ old('near_right_prism') }}"></td>
                                <td style="min-width: 70px;"><input id="near_right_base" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_right_base" value="{{ old('near_right_base') }}"></td>
                                <td style="min-width: 70px;"><input id="near_right_pd" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_right_pd" value="{{ old('near_right_pd') }}"></td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">Izquierdo</td>
                                <td style="min-width: 70px;"><input id="near_left_eye_sphere" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_left_eye_sphere" value="{{ old('near_left_eye_sphere') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_eye_cyl" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_left_eye_cyl" value="{{ old('near_left_eye_cyl') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_axis" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_left_axis" value="{{ old('near_left_axis') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_prism" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_left_prism" value="{{ old('near_left_prism') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_base" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_left_base" value="{{ old('near_left_base') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_pd" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_left_pd" value="{{ old('near_left_pd') }}"></td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;"> {!! Form::label('doctor_name', 'Médico', [ 'class' => 'col-md-1 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        {!! Form::text('doctor_name', old('doctor_name'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('doctor_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('doctor_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">{!! Form::label('frame', 'Código Armazón', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        {!! Form::text('frame', old('frame'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('frame'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('frame') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">{!! Form::label('crystal', 'Cristales', [ 'class' => 'col-md-3 control-label']) !!}</td>
                                <td colspan="7">
                                    <div class="tab">
                                        <button id="defaultOpen" type="button" class="tablinks" onclick="openCity(event, 'Mineral')">Mineral</button>
                                        <button type="button" class="tablinks" onclick="openCity(event, 'Organico')">Orgánico</button>
                                        <button type="button" class="tablinks" onclick="openCity(event, 'Policarbonato')">Policarbonato</button>
                                        <button type="button" class="tablinks" onclick="openCity(event, 'Contacto')">Contacto</button>
                                    </div>

                                    <div id="Mineral" class="tabcontent">
                                        <div class="table-responsive" style="overflow-y:auto; max-height:300px;">
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <th>Seleccionar</th>
                                                    <th>Rango dioptría</th>
                                                    <th>Tipo</th>
                                                    <th>Tratamiento</th>
                                                    <th>Foco</th>
                                                    <th>Lente</th>
                                                    <th>Valor</th>
                                                </tr>
                                        @foreach($crystals as $crystal)
                                            @if($crystal->material->name == 'Mineral')
                                                <tr>
                                                    <td style="text-align: center;"><input type="radio" name="crystals" value="{{ $crystal->id }}"></td>
                                                    <td>{{ $crystal->diopterRange->range }}</td>
                                                    <td>{{ $crystal->material->name }}</td>
                                                    <td>{{ $crystal->crystalTreatment->name }}</td>
                                                    <td>{{ $crystal->focus->name }}</td>
                                                    <td>{{ $crystal->crystalType->name }}</td>
                                                    <td>{{ '$ ' . $crystal->price }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                            </table>
                                        </div>
                                    </div>

                                    <div id="Organico" class="tabcontent">
                                        <div class="table-responsive" style="overflow-y:auto; max-height:300px;">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Seleccionar</th>
                                                    <th>Rango dioptría</th>
                                                    <th>Tipo</th>
                                                    <th>Tratamiento</th>
                                                    <th>Foco</th>
                                                    <th>Lente</th>
                                                </tr>
                                                @foreach($crystals as $crystal)
                                                    @if($crystal->material->name == 'Orgánico')
                                                        <tr>
                                                            <td style="text-align: center;"><input type="radio" name="crystals" value="{{ $crystal->id }}"></td>
                                                            <td>{{ $crystal->diopterRange->range }}</td>
                                                            <td>{{ $crystal->material->name }}</td>
                                                            <td>{{ $crystal->crystalTreatment->name }}</td>
                                                            <td>{{ $crystal->focus->name }}</td>
                                                            <td>{{ $crystal->crystalType->name }}</td>
                                                            <td>{{ '$ ' . $crystal->price }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>

                                    <div id="Policarbonato" class="tabcontent">
                                        <div class="table-responsive" style="overflow-y:auto; max-height:300px;">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Seleccionar</th>
                                                    <th>Rango dioptría</th>
                                                    <th>Tipo</th>
                                                    <th>Tratamiento</th>
                                                    <th>Foco</th>
                                                    <th>Lente</th>
                                                </tr>
                                                @foreach($crystals as $crystal)
                                                    @if($crystal->material->name == 'Policarbonato')
                                                        <tr>
                                                            <td style="text-align: center;"><input type="radio" name="crystals" value="{{ $crystal->id }}"></td>
                                                            <td>{{ $crystal->diopterRange->range }}</td>
                                                            <td>{{ $crystal->material->name }}</td>
                                                            <td>{{ $crystal->crystalTreatment->name }}</td>
                                                            <td>{{ $crystal->focus->name }}</td>
                                                            <td>{{ $crystal->crystalType->name }}</td>
                                                            <td>{{ '$ ' . $crystal->price }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div id="Contacto" class="tabcontent">
                                        <div class="table-responsive" style="overflow-y:auto; max-height:300px;">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Seleccionar</th>
                                                    <th>Rango dioptría</th>
                                                    <th>Tipo</th>
                                                    <th>Tratamiento</th>
                                                    <th>Foco</th>
                                                    <th>Lente</th>
                                                </tr>
                                                @foreach($crystals as $crystal)
                                                    @if($crystal->material->name == 'Contacto')
                                                        <tr>
                                                            <td style="text-align: center;"><input type="radio" name="crystals" value="{{ $crystal->id }}"></td>
                                                            <td>{{ $crystal->diopterRange->range }}</td>
                                                            <td>{{ $crystal->material->name }}</td>
                                                            <td>{{ $crystal->crystalTreatment->name }}</td>
                                                            <td>{{ $crystal->focus->name }}</td>
                                                            <td>{{ $crystal->crystalType->name }}</td>
                                                            <td>{{ '$ ' . $crystal->price }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">{!! Form::label('observation', 'Observaciones', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        {!! Form::text('observation', old('observation'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('observation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('observation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">{!! Form::label('pay', 'Abono', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        {!! Form::text('pay', old('pay'), [ 'class' => 'form-control', 'onKeyPress'=>'return soloNumeros(event)']) !!}
                                        @if ($errors->has('pay'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pay') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
<!-- inicio tabla -->
                    <div class="modal-footer">
                        {!! Form::submit('Ingresar', [ 'class' => 'btn btn-primary' ]) !!}
                        <a href="{{ url('/home') }}" class="btn btn-primary">Ir al inicio</a>
                    </div>
<!-- cierre formulario -->
                {!! Form::close() !!}
            </div>
        </div>
</body>
@endsection

<script>
    function soloNumeros(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123456789+-.";
        especiales = "8-37-39-46";

        tecla_especial = false;
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

<script>
    function validaForm(){

        var aux = 0;

    /*>>>>>>>>>> valida ojo derecho lejos >>>>>>>>>>>>*/
        var far_r_s = document.getElementById("far_right_eye_sphere");
        if(far_r_s.value.length == 0){
            aux++;
        }
        var far_r_c = document.getElementById("far_right_eye_cyl");
        if(far_r_c.value.length == 0){
            aux++;
        }
        var far_r_a = document.getElementById("far_right_axis");
        if(far_r_a.value.length == 0){
            aux++;
        }
        var far_r_p = document.getElementById("far_right_prism");
        if(far_r_p.value.length == 0){
            aux++;
        }
        var far_r_b = document.getElementById("far_right_base");
        if(far_r_b.value.length == 0){
            aux++;
        }
        var far_r_pd = document.getElementById("far_right_pd");
        if(far_r_pd.value.length == 0){
            aux++;
        }

    /*>>>>>>>>>> valida ojo izquierdo lejos >>>>>>>>>>>>*/

        var far_l_s = document.getElementById("far_left_eye_sphere");
        if(far_l_s.value.length == 0){
            aux++;
        }
        var far_l_c = document.getElementById("far_left_eye_cyl");
        if(far_l_c.value.length == 0){
            aux++;
        }
        var far_l_a = document.getElementById("far_left_axis");
        if(far_l_a.value.length == 0){
            aux++;
        }
        var far_l_p = document.getElementById("far_left_prism");
        if(far_l_p.value.length == 0){
            aux++;
        }
        var far_l_b = document.getElementById("far_left_base");
        if(far_l_b.value.length == 0){
            aux++;
        }
        var far_l_pd = document.getElementById("far_left_pd");
        if(far_l_pd.value.length == 0){
            aux++;
        }

     /*>>>>>>>>>> valida ojo derecho cerca >>>>>>>>>>>>*/

        var n_r_s = document.getElementById("near_right_eye_sphere");
        if(n_r_s.value.length == 0){
            aux++;
        }
        var n_r_c = document.getElementById("near_right_eye_cyl");
        if(n_r_c.value.length == 0){
            aux++;
        }
        var n_r_a = document.getElementById("near_right_axis");
        if(n_r_a.value.length == 0){
            aux++;
        }
        var n_r_p = document.getElementById("near_right_prism");
        if(n_r_p.value.length == 0){
            aux++;
        }
        var n_r_b = document.getElementById("near_right_base");
        if(n_r_b.value.length == 0){
            aux++;
        }
        var n_r_pd = document.getElementById("near_right_pd");
        if(n_r_pd.value.length == 0){
            aux++;
        }

    /*>>>>>>>>>> valida ojo izuquiero cerca >>>>>>>>>>>>*/

        var n_l_s = document.getElementById("near_left_eye_sphere");
        if(n_l_s.value.length == 0){
            aux++;
        }
        var n_l_c = document.getElementById("near_left_eye_cyl");
        if(n_l_c.value.length == 0){
            aux++;
        }
        var n_l_a = document.getElementById("near_left_axis");
        if(n_l_a.value.length == 0){
            aux++;
        }
        var n_l_p = document.getElementById("near_left_prism");
        if(n_l_p.value.length == 0){
            aux++;
        }
        var n_l_b = document.getElementById("near_left_base");
        if(n_l_b.value.length == 0){
            aux++;
        }
        var n_l_pd = document.getElementById("near_left_pd");
        if(n_l_pd.value.length == 0){
            aux++;
        }

        if(aux >= 24){
            swal("Verifique en la receta", "Ingrese valores de dioptría", "warning");
            return false;
        }

        var frame = document.getElementById("frame").value;
        if(frame == "") {
            swal("Verifique en la receta", "Ingrese código de armazón", "warning");
            return false;
        }
        if(!frame.match(/^\d+/)) {
            swal("Verifique en la receta", "Ingrese un código válido de armazón", "warning");
            return false;
        }

        var pay = document.getElementById("pay").value;
        if(pay == "") {
            swal("Verifique en la receta", "Ingrese valor en campo abono (Si no abona ingrese 0)", "warning");
            return false;
        }
        if(!pay.match(/^\d+/)) {
            swal("Verifique en la receta", "Ingrese valor válido en abono (Si no abona ingrese 0)", "warning");
            return false;
        }

    }

</script>
