@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Detalle de ventas de artículos del día</div>
        <div class="panel-body">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <th class="" style="text-align: center">Cod. venta</th>
                <th class="" style="text-align: center">Articulo</th>
                <th class="" style="text-align: left">Hora</th>
                <th class="" style="text-align: center">Precio</th>
                <th class="" style="text-align: center">Cantidad</th>
                <th class="" style="text-align: left">Subtotal</th>
                </thead>
                <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td style="text-align: center">{{ $sale->id }}</td>
                        <td style="text-transform: capitalize">{{ $sale->name }}</td>
                        <td style="text-transform: capitalize">{{ $sale->hour }}</td>
                        <td style="text-align: center">{{ $sale->price }}</td>
                        <td style="text-align: center">{{ $sale->quantity }}</td>
                        <td style="text-align: center"><input class="form-control subtotal" value="{{ $sale->subtotal }}" readonly style="background-color:#fff; max-width: 100px;"/></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div class="col-md-4 col-md-offset-8">
                <label class="control-label">Total</label>
                <input class="form-control" id="totalsaletoday" type="text" readonly style="background-color: #fff; text-align: right;"/>
            </div>
        </div>
        <div class="col-md-12 modal-footer" style="margin-top: 20px;">
            <a href="{{ url('home') }}" class="btn btn-primary">Ir al inicio</a>

        </div>
        </div>
    </div>
    </body>
@endsection

@section('script')
    <!-- scripts for articles sales functions -->
    {!! Html::script('/custom/salesfunctions.js') !!}
@endsection