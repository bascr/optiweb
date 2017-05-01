@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Venta</div>
                    <div class="panel-body">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <h4 class="col-md-9">Venta realizada con exito, detalle a continuación:</h4>
                                <a class="btn btn-primary pull-right" href="#" onclick="return xepOnline.Formatter.Format('ticket', {render:'download'});"><i class="fa fa-print"></i><span> Imprimir ticket</span></a>
                            </div>
                            <div class="col-md-12" id="ticket">
                                <div class="col-md-6 col-md-offset-3" style="margin-top: 20px;">
                                    <div class="col-md-12">
                                        <h4>Ópticas Alarcón</h4>
                                        <h5>Serafín Zamora #458, 2do piso, local 5</h5>
                                        <h5>Fecha: {{ Carbon\Carbon::parse($date)->format('d/m/Y H:i') }}</h5>
                                        <h5>Atendido por: {{ $user->name . ' ' . $user->last_name }}</h5>
                                        <h5>Cod. venta: {{ $sale_id }} </h5>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <th><h6>Cod.</h6></th>
                                                <th><h6>Articulo</h6></th>
                                                <th><h6>Cantidad</h6></th>
                                                <th><h6>Precio unitario</h6></th>
                                            </tr>
                                            @for($i = 0; $i < count($cods_article); $i++ )
                                                <tr>
                                                    <th><h6>{{ $cods_article[$i] }}</h6></th>
                                                    <th><h6>{{ $name_articles[$i] }}</h6></th>
                                                    <th><h6>{{ $quantities[$i] }}</h6></th>
                                                    <th><h6>{{ $prices[$i] }}</h6></th>
                                                </tr>
                                            @endfor
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Total: {{ $total }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 modal-footer">
                                <a href="{{ url('/article_sale') }}" class="btn btn-primary">Realizar otra venta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
