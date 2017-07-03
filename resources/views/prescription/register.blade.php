@extends('layouts.app')

@section('content')
<div class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de recetas</div>
            <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open(['method'=>'POST', 'action'=>'PrescriptionController@create', 'onSubmit'=> 'return validaForm();' , 'class' => 'form-horizontal'])!!}

                {!! Form::token() !!}
<!-- inicio tabla -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr style="background-color: #F2F2F2;">
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
                            <tr style="background-color: #F2F2F2; text-align: center;">
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
                                <td style="min-width: 70px;"><input id="far_right_axis" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="far_right_axis" value="{{ old('far_right_axis') }}"></td>
                                <td style="min-width: 70px;"><input id="far_right_prism" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="far_right_prism" value="{{ old('far_right_prism') }}"></td>
                                <td style="min-width: 70px;"><input id="far_right_base" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="far_right_base" value="{{ old('far_right_base') }}"></td>
                                <td style="min-width: 70px;"><input id="far_right_pd" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="far_right_pd" value="{{ old('far_right_pd') }}"></td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">Izquierdo</td>
                                <td style="min-width: 70px;"><input id="far_left_eye_sphere" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_left_eye_sphere" value="{{ old('far_left_eye_sphere') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_eye_cyl" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="far_left_eye_cyl" value="{{ old('far_left_eye_cyl') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_axis" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="far_left_axis" value="{{ old('far_left_axis') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_prism" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="far_left_prism" value="{{ old('far_left_prism') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_base" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="far_left_base" value="{{ old('far_left_base') }}"></td>
                                <td style="min-width: 70px;"><input id="far_left_pd" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="far_left_pd" value="{{ old('far_left_pd') }}"></td>
                            </tr>
                            <tr style="background-color: #F2F2F2; text-align: center;">
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
                                <td style="min-width: 70px;"><input id="near_right_axis" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="near_right_axis" value="{{ old('near_right_axis') }}"></td>
                                <td style="min-width: 70px;"><input id="near_right_prism" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="near_right_prism" value="{{ old('near_right_prism') }}"></td>
                                <td style="min-width: 70px;"><input id="near_right_base" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="near_right_base" value="{{ old('near_right_base') }}"></td>
                                <td style="min-width: 70px;"><input id="near_right_pd" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="near_right_pd" value="{{ old('near_right_pd') }}"></td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">Izquierdo</td>
                                <td style="min-width: 70px;"><input id="near_left_eye_sphere" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_left_eye_sphere" value="{{ old('near_left_eye_sphere') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_eye_cyl" type="text" class="form-control" maxlength="6" onKeyPress="return soloNumeros(event)" name="near_left_eye_cyl" value="{{ old('near_left_eye_cyl') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_axis" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="near_left_axis" value="{{ old('near_left_axis') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_prism" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="near_left_prism" value="{{ old('near_left_prism') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_base" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="near_left_base" value="{{ old('near_left_base') }}"></td>
                                <td style="min-width: 70px;"><input id="near_left_pd" type="text" class="form-control" maxlength="3" onKeyPress="return soloNumeros2(event)" name="near_left_pd" value="{{ old('near_left_pd') }}"></td>
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
                                <td colspan="1">
                                    <div>
                                        {!! Form::text('frame', old('frame'), [ 'class' => 'form-control']) !!}
                                        @if ($errors->has('frame'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('frame') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td style="min-width: 70px;">{!! Form::label('frameName', 'Armazón', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="3">
                                    <div>
                                        {!! Form::text('frameName', old('frameName'), [ 'class' => 'form-control', 'style' => 'background-color:#fff;', 'readonly' => 'true']) !!}
                                        @if ($errors->has('frameName'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('frameName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td style="min-width: 70px;">{!! Form::label('price', 'Precio', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="1">
                                    <div>
                                        {!! Form::text('price', old('price'), [ 'class' => 'form-control', 'style' => 'background-color:#fff; text-align:right;', 'readonly' => 'true']) !!}
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
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
                                    </div>

                                    <div id="Mineral" class="tabcontent">
                                        <div class="table-responsive" style="overflow-y:auto; max-height:300px;">
                                            <table class="table table-bordered table-hover crystalTable">
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
                                                    <td>{{ $crystal->price }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                            </table>
                                        </div>
                                    </div>

                                    <div id="Organico" class="tabcontent">
                                        <div class="table-responsive" style="overflow-y:auto; max-height:300px;">
                                            <table class="table table-bordered crystalTable">
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
                                                    @if($crystal->material->name == 'Orgánico')
                                                        <tr>
                                                            <td style="text-align: center;"><input type="radio" name="crystals" value="{{ $crystal->id }}"></td>
                                                            <td>{{ $crystal->diopterRange->range }}</td>
                                                            <td>{{ $crystal->material->name }}</td>
                                                            <td>{{ $crystal->crystalTreatment->name }}</td>
                                                            <td>{{ $crystal->focus->name }}</td>
                                                            <td>{{ $crystal->crystalType->name }}</td>
                                                            <td>{{ $crystal->price }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>

                                    <div id="Policarbonato" class="tabcontent">
                                        <div class="table-responsive" style="overflow-y:auto; max-height:300px;">
                                            <table class="table table-bordered crystalTable">
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
                                                    @if($crystal->material->name == 'Policarbonato')
                                                        <tr>
                                                            <td style="text-align: center;"><input type="radio" name="crystals" value="{{ $crystal->id }}"></td>
                                                            <td>{{ $crystal->diopterRange->range }}</td>
                                                            <td>{{ $crystal->material->name }}</td>
                                                            <td>{{ $crystal->crystalTreatment->name }}</td>
                                                            <td>{{ $crystal->focus->name }}</td>
                                                            <td>{{ $crystal->crystalType->name }}</td>
                                                            <td>{{ $crystal->price }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="min-width: 70px;">{!! Form::label('total', 'Total', [ 'class' => 'col-md-2 control-label']) !!}</td>
                                <td colspan="7">
                                    <div>
                                        {!! Form::text('total', old('total'), [ 'class' => 'form-control', 'style' => 'background-color:#fff; text-align:right; max-width:100px;', 'readonly' => 'true']) !!}
                                        @if ($errors->has('total'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('total') }}</strong>
                                            </span>
                                        @endif
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
                                        {!! Form::text('pay', old('pay'), [ 'class' => 'form-control', 'onKeyPress'=>'return soloNumeros(event)', 'style'=>'text-align:right; max-width:100px;']) !!}
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
</div>
@endsection

@section('css')
    <!-- style to set tabs in prescription-->
    {!! Html::style('custom/tabs.css') !!}
@endsection

@section('ajaxToken')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@endsection

@section('ajaxScriptToken')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
@endsection

@section('script')
    <!-- script to set tabs in prescription-->
    {!! Html::script('custom/tabs.js') !!}
    <!-- check the first radio button in prescription -->
    {!! Html::script('custom/checkradioprescription.js') !!}
    <!-- script to receive frame data through ajax  -->
    {!! Html::script('custom/prescriptionfunctions.js') !!}
@endsection

