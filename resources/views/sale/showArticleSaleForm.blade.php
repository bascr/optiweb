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
                        <div class="form-group">
                            <label for="codArticle" class="col-md-2 control-label" >Cód. Artículo</label>
                            <div class="col-md-2">
                                <input class="form-control codArticle" name="codArticle" type="text" onkeypress="return soloNumeros(event)" style="max-width:100px;"/>
                            </div>
                            <label for="article" class="col-md-1 control-label" >Artículo</label>
                            <div class="col-md-3">
                                <input class="form-control article" name="article" type="text" style="max-width:200px;" readonly/>
                            </div>
                            <label for="quantity" class="col-md-1 control-label" >Cantidad</label>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="quantity" onkeypress="return soloNumeros(event)" style="max-width:100px;" min="1" value="1"/>
                            </div>
                            <div class="col-md-12 modal-footer" style="margin-top: 20px;"></div>
                        </div>
                    </div>
                    <!-- Botón registrar -->
                    <div class="col-md-6 col-md-offset-4 pull-right">
                        <input class="btn btn-success addButton" type="button" value="Añadir otro artículo a la venta"/>
                        {!! Form::submit('Registrar', [ 'class' => 'btn btn-primary' ]) !!}
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
