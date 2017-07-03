@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Listado de productos</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center;">
                                <tr>
                                    <th>Producto</th>
                                    <th>Marca</th>
                                    <th>Proveedor</th>
                                    <th style="text-align:center;">Stock actual</th>
                                    <th style="text-align:center;">Editar características</th>
                                    <th style="text-align:center;">Añadir stock</th>
                                </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td style="text-align:left;">{{ $product->productable->name }}</td>
                                    <td style="text-align:left;">{{ $product->brand->name }}</td>
                                    <td style="text-align:left;">{{ $product->supplier->name }}</td>
                                    <td>{{ $product->productable->stock }}</td>
                                    <td><a class="btn btn-primary" href="product/{{ $product->productable_id }}">Editar</a></td>
                                    <td><a class="btn btn-primary" href="product/stock/{{ $product->productable_id }}">Añadir</a></td>
                                </tr>
                            @endforeach
                            </table>
                            {{ $products->links() }}
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