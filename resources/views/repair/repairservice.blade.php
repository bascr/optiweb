@extends('layouts.app')

@section('content')
    <body>
    <div class="box-header">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de reparaciones</div>
                    <div class="panel-body">

<!-- Inicio formulario -->
                        {!! Form::open(['method'=>'POST', 'action'=>'RepairController@createinternal','onSubmit'=> 'return validaForm();', 'class' => 'form-horizontal']) !!}

                        {!! Form::token() !!}
<!-- Droplist taller -->
                        <div class="form-group{{ $errors->has('workshop') ? ' has-error' : '' }}">
                            <label for="workshop" class="col-md-2 control-label">Taller</label>
                            <input class="hidden" name="client_run" id="client_run" value="{{ $client->run }}">
                            <div class="col-md-4">
                                <select id="workshop" class="form-control" name="workshop">
                                    <option value="0" selected>Seleccione taller</option>
                                    @foreach($workshops as $workshop)
                                        <option value="{{ $workshop->id }}">{{ $workshop->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('workshop'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('workshop') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
<!-- Campo observacion -->
                        <div class="form-group {{$errors->has('observacion') ? 'has-error' : ''}}">
                            {!! Form::label('observacion', 'Observación', [ 'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('observacion', old('observacion'), [ 'class' => 'form-control', 'maxlength' => '150']) !!}
                                @if ($errors->has('observacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 modal-footer" style="margin-top: 20px;"></div>
<!-- Campo articulos -->
                        <div id="articles">
                            <div class="">
                                <div class="col-md-2">
                                    <label for="codArticle" class="control-label" >Cód. Artículo</label>
                                    <input class="form-control codArticle" name="codArticle[]" type="text" onkeypress="return soloNumeros(event)" style="min-width:80px;"/>
                                </div>
                                <div class="col-md-4">
                                    <label for="article" class="control-label" >Artículo</label>
                                    <input class="form-control article" name="article[]" type="text" style=" background-color:#fff; min-width:150px;" readonly value="Articulo no encontrado, o sin stock"/>
                                </div>
                                <div class="col-md-2">
                                    <label for="quantity" class="control-label" >Cantidad</label>
                                    <input type="number" class="form-control quantity" name="quantity[]" onkeypress="return soloNumeros(event)" style="max-width:100px;" min="1" value="1"/>
                                </div>
                                <div class="col-md-2">
                                    <label for="price" class="control-label" >Precio Unitario</label>
                                    <input type="text" class="form-control price" name="price[]" onkeypress="return soloNumeros(event)" style="background-color:#fff; max-width:100px;" value="0" readonly/>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-12 modal-footer" style="margin-top: 20px;"></div>
                            </div>
                        </div>
                        <!-- Botón registrar -->
                        <div class="col-md-12 pull-right">
                            <label class="col-md-8 control-label" style="margin-right: 5px;">Subtotal</label>
                            <div class="col-md-2">
                                <input id="total" class="form-control" name="total" type="text" readonly value="0" style="background-color:#fff; max-width:100px;"/>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-4 pull-right" style="margin-top: 20px; margin-bottom: 20px;">
                            <input class="btn btn-success addButton" type="button" value="Añadir otro artículo a la venta"/>
                        </div>
                        <div class="col-md-12 modal-footer" style="margin-top: 20px;"></div>



<!-- Campo mano de obra -->
                                <div class="form-group {{$errors->has('price') ? 'has-error' : ''}}">
                                    {!! Form::label('price', 'Mano de obra', [ 'class' => 'col-md-8 control-label']) !!}
                                    <div class="col-md-2">
                                        {!! Form::text('price', old('price'), [ 'class' => 'form-control', 'onkeypress' => 'return soloNumeros(event)', 'maxlength' => '6']) !!}
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
<!-- Campo total -->
                        <div class="form-group {{$errors->has('totales') ? 'has-error' : ''}}">
                            {!! Form::label('totales', 'Total', [ 'class' => 'col-md-8 control-label']) !!}
                            <div class="col-md-2">
                                {!! Form::text('totales', old('totales'), [ 'class' => 'form-control', 'onkeypress' => 'return soloNumeros(event)', 'maxlength' => '6', 'readonly' => 'true']) !!}
                                @if ($errors->has('totales'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('totales') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 modal-footer" style="margin-top: 20px;"></div>
<!-- Campo abono -->
                        <div class="form-group {{$errors->has('pay') ? 'has-error' : ''}}">
                            {!! Form::label('pay', 'Abono', [ 'class' => 'col-md-8 control-label']) !!}
                            <div class="col-md-2">
                                {!! Form::text('pay', old('pay'), [ 'class' => 'form-control', 'onkeypress' => 'return soloNumeros(event)', 'maxlength' => '6']) !!}
                                @if ($errors->has('pay'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('pay') }}</strong>
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
@endsection

@section('script')

    <!-- script to receive frame data through ajax  -->
    {!! Html::script('custom/repairfunctions.js') !!}

    <script>

        function soloNumeros(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "0123456789";
            especiales = "8-37-39-46";

            tecla_especial = false
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

        function soloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";

            tecla_especial = false
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