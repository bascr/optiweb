@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Venta anual</div>
        <div class="panel-body">
            <div class="col-md-12">
                <!-- Table for prescriptions sales-->
                <h2>Ventas de recetas</h2>
                <table class="table table-striped">
                    <thead>
                    <th class="" style="text-align: center">Id venta</th>
                    <th class="" style="text-align: left">Vendedor</th>
                    <th class="" style="text-align: left">Cliente</th>
                    <th class="" style="text-align: left">Fecha</th>
                    <th class="" style="text-align: left">Abono</th>
                    <th class="" style="text-align: left">Tipo de venta</th>
                    <th class="" style="text-align: left">Armazón</th>
                    <th class="" style="text-align: left">Cristal</th>
                    <th class="" style="text-align: left">Total</th>
                    </thead>
                    <tbody>
                    @foreach($paginated_prescription_sales_array as $prescription)
                        <tr>
                            <td style="text-align: center">{{ $prescription[0] }}</td>
                            <td style="text-transform: capitalize">{{ $prescription[1] }}</td>
                            <td style="text-transform: capitalize">{{ $prescription[2] }}</td>
                            <td style="text-transform: capitalize">{{ $prescription[3] }}</td>
                            <td style="text-transform: capitalize">{{ $prescription[4] }}</td>
                            <td style="text-transform: capitalize">{{ $prescription[5] }}</td>
                            <td style="text-transform: capitalize">{{ $prescription[6] }}</td>
                            <td style="text-transform: capitalize">{{ $prescription[7] }}</td>
                            <td style="text-transform: capitalize">{{ $prescription[8] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $paginated_prescription_sales_array->setPath(Request::url())->render() !!}

                <div class="col-md-12 modal-footer" style="margin-top: 20px;">

                </div>
                <!-- Table for article sales-->
                <h2>Ventas de artículos</h2>
                <table class="table table-striped">
                    <thead>
                    <th class="" style="text-align: center">Id de venta</th>
                    <th class="" style="text-align: left">Vendedor</th>
                    <th class="" style="text-align: left">Fecha</th>
                    <th class="" style="text-align: left">Tipo de venta</th>
                    <th class="" style="text-align: left">Articulo</th>
                    <th class="" style="text-align: left">Cantidad</th>
                    <th class="" style="text-align: left">Total</th>
                    </thead>
                    <tbody>
                    @foreach($paginated_article_sales_array as $article)
                        <tr>
                            <td style="text-align: center">{{ $article[0] }}</td>
                            <td style="text-transform: capitalize">{{ $article[1] }}</td>
                            <td style="text-transform: capitalize">{{ $article[2] }}</td>
                            <td style="text-transform: capitalize">{{ $article[3] }}</td>
                            <td style="text-transform: capitalize">{{ $article[4] }}</td>
                            <td style="text-transform: capitalize">{{ $article[5] }}</td>
                            <td style="text-transform: capitalize">{{ $article[6] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $paginated_article_sales_array->setPath(Request::url())->render() !!}

                <div class="col-md-12 modal-footer" style="margin-top: 20px;">

                </div>
                <!-- Table for repair services sales-->
                <h2>Reparaciones</h2>
                <table class="table table-striped">
                    <thead>
                    <th class="" style="text-align: center">Id de venta</th>
                    <th class="" style="text-align: left">Vendedor</th>
                    <th class="" style="text-align: left">Cliente</th>
                    <th class="" style="text-align: left">Taller</th>
                    <th class="" style="text-align: left">Fecha</th>
                    <th class="" style="text-align: left">Abono</th>
                    <th class="" style="text-align: center">Mano de obra</th>
                    <th class="" style="text-align: left">Tipo de venta</th>
                    <th class="" style="text-align: left">Artículo</th>
                    <th class="" style="text-align: left">Cantidad</th>
                    <th class="" style="text-align: left">subtotal</th>
                    <th class="" style="text-align: left">Total</th>
                    </thead>
                    <tbody>
                    @foreach($paginated_repair_sales_array as $repair)
                        <tr>
                            <td style="text-align: center">{{ $repair[0] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[1] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[2] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[3] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[4] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[5] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[6] }}</td>
                            <td style="text-align: center">{{ $repair[7] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[8] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[9] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[10] }}</td>
                            <td style="text-transform: capitalize">{{ $repair[11] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $paginated_repair_sales_array->setPath(Request::url())->render() !!}

            </div>
            <div class="col-md-12 modal-footer" style="margin-top: 20px;">
                <a href="{{ url('/report/annual_sales/export') }}" class="btn btn-success"><i class="fa fa-file-excel-o"></i>  Exportar a excel</a>
                <a href="{{ url('home') }}" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </div>
    </body>
@endsection
