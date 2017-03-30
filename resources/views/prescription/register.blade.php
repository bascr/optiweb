@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="row">
        <div class="col-md-12">
            <div class="panel"  style="padding: 1%">
                <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de recetas</div>
                <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open(['method'=>'POST', 'action'=>'PrescriptionController@create', 'onSubmit'=> 'return validaForm();' , 'class' => 'form-horizontal'])!!}

                {!! Form::token() !!}
<!-- Nombre cliente -->
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-1 control-label']) !!}
                        <div class="col-md-6">
                            <label class="control-label text-capitalize" >{{$datos[0]}}</label>
                            <input class="hidden" name="client_run" id="client_run" value="{{$datos[1]}}"></input>
                            <input id="client_run" type="text" class="hidden" name="client_run" value="{{ $datos[1]}}">
                            @if ($errors->has('client_run'))
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
                                <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                <div class="col-md-2"><label class="col-md-4 control-label">Ojo</label></div>
                                <div class="col-md-8"><label class="col-md-4 control-label">Dioptria</label></div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><label class="col-md-4 control-label">Esferico</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">Cilindrico</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">Eje</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">Prisma</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">Base</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">D.P</label></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"><label class="col-md-4 control-label">Derecho</label></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><input id="far_right_eye_sphere" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_eye_sphere" value="{{ old('far_right_eye_sphere') }}"></div>
                                    <div class="col-md-2"><input id="far_right_eye_cyl" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_eye_cyl" value="{{ old('far_right_eye_cyl') }}"></div>
                                    <div class="col-md-2"><input id="far_right_axis" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_axis" value="{{ old('far_right_axis') }}"></div>
                                    <div class="col-md-2"><input id="far_right_prism" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_prism" value="{{ old('far_right_prism') }}"></div>
                                    <div class="col-md-2"><input id="far_right_base" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_base" value="{{ old('far_right_base') }}"></div>
                                    <div class="col-md-2"><input id="far_right_pd" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_right_pd" value="{{ old('far_right_pd') }}"></div>
                                </div>
                            </div>
                        </div>
    <!-- Fin derecho -->
    <!-- Ojo izquierdo -->
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="col-md-2"><label class="col-md-4 control-label">Lejos</label></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"><label class="col-md-4 control-label">Izquierdo</label></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><input id="far_left_eye_sphere" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_eye_sphere" value="{{ old('far_left_eye_sphere') }}"></div>
                                    <div class="col-md-2"><input id="far_left_eye_cyl" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_eye_cyl" value="{{ old('far_left_eye_cyl') }}"></div>
                                    <div class="col-md-2"><input id="far_left_axis" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_axis" value="{{ old('far_left_axis') }}"></div>
                                    <div class="col-md-2"><input id="far_left_prism" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_prism" value="{{ old('far_left_prism') }}"></div>
                                    <div class="col-md-2"><input id="far_left_base" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_base" value="{{ old('far_left_base') }}"></div>
                                    <div class="col-md-2"><input id="far_left_pd" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="far_left_pd" value="{{ old('far_left_pd') }}"></div>
                                </div>
                            </div>
                        </div>
    <!-- Fin izquierdo -->
<!-- Fin vision de lejos -->
<!-- Vision de cerca -->
<!-- Ojo derecho -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                <div class="col-md-8"><label class="col-md-4 control-label"></label></div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><label class="col-md-4 control-label">Esferico</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">Cilindrico</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">Eje</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">Prisma</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">Base</label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label">D.P</label></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"><label class="col-md-4 control-label">Derecho</label></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><input id="near_right_eye_sphere" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_eye_sphere" value="{{ old('near_right_eye_sphere') }}"></div>
                                    <div class="col-md-2"><input id="near_right_eye_cyl" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_eye_cyl" value="{{ old('near_right_eye_cyl') }}"></div>
                                    <div class="col-md-2"><input id="near_right_axis" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_axis" value="{{ old('near_right_axis') }}"></div>
                                    <div class="col-md-2"><input id="near_right_prism" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_prism" value="{{ old('near_right_prism') }}"></div>
                                    <div class="col-md-2"><input id="near_right_base" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_base" value="{{ old('near_right_base') }}"></div>
                                    <div class="col-md-2"><input id="near_right_pd" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_right_pd" value="{{ old('near_right_pd') }}"></div>
                                </div>
                            </div>
                        </div>
<!-- Fin derecho -->
<!-- Ojo izquierdo -->
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="col-md-2"><label class="col-md-4 control-label">Cerca</label></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                    <div class="col-md-2"><label class="col-md-4 control-label"></label></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"><label class="col-md-4 control-label">Izquierdo</label></div>
                                <div class="col-md-8">
                                    <div class="col-md-2"><input id="near_left_eye_sphere" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_eye_sphere" value="{{ old('near_left_eye_sphere') }}"></div>
                                    <div class="col-md-2"><input id="near_left_eye_cyl" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_eye_cyl" value="{{ old('near_left_eye_cyl') }}"></div>
                                    <div class="col-md-2"><input id="near_left_axis" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_axis" value="{{ old('near_left_axis') }}"></div>
                                    <div class="col-md-2"><input id="near_left_prism" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_prism" value="{{ old('near_left_prism') }}"></div>
                                    <div class="col-md-2"><input id="near_left_base" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_base" value="{{ old('near_left_base') }}"></div>
                                    <div class="col-md-2"><input id="near_left_pd" type="text" class="form-control" maxlength="4" onKeyPress="return soloNumeros(event)" name="near_left_pd" value="{{ old('near_left_pd') }}"></div>
                                </div>
                            </div>
                        </div>
<!-- Fin izquierdo -->
<!-- Fin vision de cerca -->
<!-- Nombre medico -->
                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::label('doctor_name', 'Médico', [ 'class' => 'col-md-1 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('doctor_name', old('doctor_name'), [ 'class' => 'form-control']) !!}
                                    @if ($errors->has('doctor_name'))
                                        <span class="help-block">
                                     <strong>{{ $errors->first('doctor_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

<!-- Armazon y cristales -->
                        <div class="form-group">

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    {!! Form::label('frame', 'Armazón', [ 'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('frame', old('frame'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('frame'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('frame') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {!! Form::label('crystal', 'Cristales', [ 'class' => 'col-md-3 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('crystal', old('crystal'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('crystal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('crystal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
<!-- Observaciones -->
                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::label('observation', 'Observaciones', [ 'class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('observation', old('observation'), [ 'class' => 'form-control']) !!}
                                    @if ($errors->has('observation'))
                                        <span class="help-block">
                                     <strong>{{ $errors->first('observation') }}</strong>
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
            alert("Ingrese valores de dioptría" + " " + aux);
            return false;
        }
    }

</script>