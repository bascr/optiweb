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
                    for($h = 0; $h < count($confirmed_sales); $h++) {
                        echo '<tr>';
                        echo '<td style="text-align: center">'.$confirmed_sales[$h]->client->run.'-'.$confirmed_sales[$h]->client->digit.'</td>';
                        echo '<td style="text-align: center">'.$confirmed_sales[$h]->client->name.' '.$confirmed_sales[$h]->client->last_name.' '.$confirmed_sales[$h]->client->second_last_name.'</td>';
                        if(count($products_sales[$h]) > 1) {
                            $total = 0;
                            for($i = 0; $i < count($products_sales); $i++) {
                                for($j = 0; $j < count($products_sales[$i]); $j++) {
                                    if($products_sales[$i][$j]->sale_id == $confirmed_sales[$h]->id) {
                                        for($l = 0; $l < count($products); $l++) {
                                            if($products[$l]->productable_id == $products_sales[$i][$j]->product_productable_id) {

                                                if($products[$l]->productable_type == 'App\Frame') {
                                                    if($products[$l]->productable->name != '') {
                                                        echo '<td style="text-align: center">'.$products[$l]->productable->name.'</td>';
                                                        $total += $products[$l]->productable->price;
                                                    }
                                                }
                                                if($products[$l]->productable_type == 'App\Crystal') {
                                                    echo '<td style="text-align: center">'.$products[$l]->productable->material->name.'</td>';
                                                    $total += $products[$l]->productable->price;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            echo '<td style="text-align: center">'.$total.'</td>';
                        } else {
                            echo '<td style="text-align: center">N/A</td>';
                            $total = 0;
                            for($i = 0; $i < count($products_sales); $i++) {
                                for($j = 0; $j < count($products_sales[$i]); $j++ ) {
                                    if($products_sales[$i][$j]->sale_id == $confirmed_sales[$h]->id) {
                                        for($l = 0; $l < count($products); $l++) {
                                            if($products[$l]->productable_id == $products_sales[$i][$j]->product_productable_id) {
                                                if($products[$l]->productable_type == 'App\Crystal') {
                                                        echo '<td style="text-align: center">'.$products[$l]->productable->material->name.'</td>';
                                                        $total += $products[$l]->productable->price;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            echo '<td style="text-align: center">'.$total.'</td>';
                        }
                        echo '</tr>';
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
