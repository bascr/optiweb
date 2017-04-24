@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Inventarios</div>
                    <div class="panel-body">
                        <table class="table table-bordered" style="text-align: center">
                            <tr>
                                <th class="col-md-2" style="text-align: center">Fecha de ingreso</th>
                                <th class="col-md-3" style="text-align: center">Responsable</th>
                                <th class="col-md-3" style="text-align: center">Ingresos de productos realizados</th>
                                <th class="col-md-3" style="text-align: center">Cantidad total de especies ingresadas</th>
                                <th class="col-md-1" style="text-align: center">Códigos de barra</th>
                            </tr>
                            @foreach($inventories as $inventory)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($inventory->created_at)->format('d-m-Y') }}</td>
                                <td>{{ $inventory->name.' '.$inventory->last_name }}</td>
                                <td>{{ $inventory->quantity_registers }}</td>
                                <td>{{ $inventory->quantity_products }}</td>
                                <td><a class="btn btn-primary" href="{{ url('/inventory/'.$inventory->created_at) }}">Imprimir</a></td>
                            </tr>
                            @endforeach
                        </table>
                        {{ $inventories->links() }}
                        <div class="panel-body">
                            <div class="modal-footer">
                                <a href="{{ url('/home') }}" class="btn btn-primary">Ir al inicio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
