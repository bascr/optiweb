@extends('layouts.app')
@section('content')
    <body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Recetas retiradas del día</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <th style="text-align: center">Run</th>
                    <th style="text-align: center">Nombre</th>
                    <th style="text-align: center">Armazón</th>
                    <th style="text-align: center">Cristal</th>
                    <th style="text-align: center">Total</th>
                </thead>
                <tbody>
                    @php
                        for($i = 0; $i < count($confirmed_sales_array); $i++) {
                            echo '<th style="text-align: center">' . $confirmed_sales_array[$i][0] . '</th>';
                            echo '<th style="text-align: center">' . $confirmed_sales_array[$i][1] . '</th>';
                            echo '<th style="text-align: center">' . $confirmed_sales_array[$i][2]. '</th>';
                            echo '<th style="text-align: center">' . $confirmed_sales_array[$i][3] . '</th>';
                            echo '<th style="text-align: center">' . $confirmed_sales_array[$i][4] . '</th>';
                        }
                    @endphp
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <a href="{{ url('home') }}" class="btn btn-primary">Ir al inicio</a>
        </div>
    </div>
    </body>
@endsection
