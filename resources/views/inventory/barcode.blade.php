@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Códigos de barra</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="barCodeTable" class="table table-bordered" style="text-align: center;">
                                @foreach($inventories as $inventory)
                                    <tr>
                                        <th colspan="4">{{ $inventory->product->productable->name }}</th>
                                    </tr>
                                @php
                                    $limitRow = ceil($inventory->quantity / 4);
                                    $cell_quantity = 0;
                                    for($i = 0; $i < $limitRow; $i++) {
                                        echo '<tr>';
                                        for($j = 0;$j < 4; $j++) {
                                            global $cell_quantity;
                                            if($cell_quantity < $inventory->quantity) {
                                                echo '<td><img src="data:image/png;base64,' . DNS1D::getBarcodePNG($inventory->product->productable_id, "C128") . '" alt="barcode"   /><br>CP: '.$inventory->product->productable_id.'</td>';
                                                $cell_quantity += 1;
                                            } else {
                                                echo '<td></td>';
                                            }

                                        }
                                        echo '</tr>';
                                    }
                                @endphp
                                @endforeach
                            </table>
                            {{ $inventories->links() }}
                        </div>
                        <div class="panel-body">
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="#" onclick="return xepOnline.Formatter.Format('barCodeTable', {render:'download'});">Imprimir</a>
                                <a href="{{ url('/inventory') }}" class="btn btn-primary">Volver</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
