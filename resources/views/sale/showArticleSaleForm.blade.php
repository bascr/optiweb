@extends('layouts.app')

@section('content')

<div class="box-header">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Venta de artículos</div>
                <div class="panel-body">
<!-- Inicio formulario -->
                {!! Form::open(['method'=>'POST', 'action'=>'SaleController@createArticleSale','class' => 'form-horizontal']) !!}

                {!! Form::token() !!}
<!-- Campo codigo articulo, cantidad -->
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
                        <label class="col-md-8 control-label" style="margin-right: 5px;">Total</label>
                        <div class="col-md-2">
                            <input id="total" class="form-control" name="total" type="text" readonly value="0" style="background-color:#fff; max-width:100px;"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-4 pull-right" style="margin-top: 20px;">
                        <input class="btn btn-success addButton" type="button" value="Añadir otro artículo a la venta"/>
                        {!! Form::submit('Registrar', [ 'class' => 'btn btn-primary', 'id' =>'send' ]) !!}
                        <a href="{{ url('/home') }}" class="btn btn-primary">Ir al inicio</a>
                    </div>
                    <!-- cierre formulario -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function soloNumeros(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123456789";
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
