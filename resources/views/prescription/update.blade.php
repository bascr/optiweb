@extends('layouts.app')

@section('content')
<body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Modificación de recetas</div>
            <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open(['method'=>'POST', 'action'=>'PrescriptionController@updatePresc', 'onSubmit'=> 'return validaForm();' , 'class' => 'form-horizontal'])!!}

                {!! Form::token() !!}
<!-- inicio tabla -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="info">
                                <td>{!! Form::label('name', 'Nombre:', [ 'class' => 'col-md-1 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        <label class="control-label text-capitalize" >{{ $name }}</label>
                                        <input  name="client_run" class="hidden" id="client_run" value="{{ $run }}">
                                        <input  name="presc_id" class="hidden" id="presc_id" value="{{ $presc->id }}">
                                        <input  id="client_run" type="text" class="hidden" name="client_run" value="{{ $run }}">
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
                                <td><input id="far_right_eye_sphere" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_eye_sphere" value="{{ $presc->far_right_eye_sphere }}"></td>
                                <td><input id="far_right_eye_cyl" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_eye_cyl" value="{{ $presc->far_right_eye_cyl }}"></td>
                                <td><input id="far_right_axis" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_axis" value="{{ $presc->far_right_eye_axis }}"></td>
                                <td><input id="far_right_prism" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_prism" value="{{ $presc->far_right_eye_prism }}"></td>
                                <td><input id="far_right_base" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_base" value="{{ $presc->far_right_eye_base }}"></td>
                                <td><input id="far_right_pd" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_pd" value="{{ $presc->far_right_eye_pd }}"></td>
                            </tr>
                            <tr>
                                <td>Izquierdo</td>
                                <td><input id="far_left_eye_sphere" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_eye_sphere" value="{{$presc->far_left_eye_sphere }}"></td>
                                <td><input id="far_left_eye_cyl" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_eye_cyl" value="{{ $presc->far_left_eye_cyl }}"></td>
                                <td><input id="far_left_axis" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_axis" value="{{ $presc->far_left_eye_axis }}"></td>
                                <td><input id="far_left_prism" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_prism" value="{{ $presc->far_left_eye_prism }}"></td>
                                <td><input id="far_left_base" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_base" value="{{ $presc->far_left_eye_base }}"></td>
                                <td><input id="far_left_pd" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_pd" value="{{ $presc->far_left_eye_pd }}"></td>
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
                                <td><input id="near_right_eye_sphere" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_eye_sphere" value="{{ $presc->near_right_eye_sphere }}"></td>
                                <td><input id="near_right_eye_cyl" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_eye_cyl" value="{{ $presc->near_right_eye_cyl }}"></td>
                                <td><input id="near_right_axis" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_axis" value="{{ $presc->near_right_eye_axis }}"></td>
                                <td><input id="near_right_prism" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_prism" value="{{ $presc->near_right_eye_prism }}"></td>
                                <td><input id="near_right_base" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_base" value="{{ $presc->near_right_eye_base }}"></td>
                                <td><input id="near_right_pd" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_pd" value="{{ $presc->near_right_eye_pd }}"></td>
                            </tr>
                            <tr>
                                <td>Izquierdo</td>
                                <td><input id="near_left_eye_sphere" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_eye_sphere" value="{{ $presc->near_left_eye_sphere }}"></td>
                                <td><input id="near_left_eye_cyl" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_eye_cyl" value="{{ $presc->near_left_eye_cyl }}"></td>
                                <td><input id="near_left_axis" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_axis" value="{{ $presc->near_left_eye_axis }}"></td>
                                <td><input id="near_left_prism" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_prism" value="{{ $presc->near_left_eye_prism }}"></td>
                                <td><input id="near_left_base" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_base" value="{{ $presc->near_left_eye_base }}"></td>
                                <td><input id="near_left_pd" type="text" class="form-control text-center" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_pd" value="{{ $presc->near_left_eye_pd }}"></td>
                            </tr>
                            <tr>
                                <td> {!! Form::label('doctor_name', 'Médico', [ 'class' => 'col-md-1 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        {!! Form::text('doctor_name', $presc->doctor_name, old('doctor_name'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('doctor_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('doctor_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{!! Form::label('frame', 'Armazón', [ 'class' => 'col-md-2 control-label']) !!}</td>
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
                                <td>{!! Form::label('crystal', 'Cristales', [ 'class' => 'col-md-3 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        {!! Form::text('crystal', old('crystal'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('crystal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('crystal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{!! Form::label('observation', 'Observaciones', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        {!! Form::text('observation', $presc->observation, old('observation'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('observation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('observation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
<!-- inicio tabla -->
                    <div class="modal-footer">
                        {!! Form::submit('Modificar', [ 'class' => 'btn btn-primary' ]) !!}
                    </div>
<!-- cierre formulario -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>
@endsection

<script>
    function soloNumeros(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123456789+-";
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
    }

</script>