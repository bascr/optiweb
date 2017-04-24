@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Listado de proveedores</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center;">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Comuna</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Editar</th>
                                </tr>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>{{ $supplier->district->name }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td><a class="btn btn-primary" href="/supplier/edit/{{ $supplier->id }}">Editar</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $suppliers->links() }}
                        </div>
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