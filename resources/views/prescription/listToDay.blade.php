@extends('layouts.app')
@section('content')
    <body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Recetas en el día</div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <th class="col-md-1" style="text-align: center">Numero</th>
                        <th class="col-md-5" style="text-align: left">Nombre</th>
                        <th class="col-md-4" style="text-align: center">Observación</th>
                        <th class="col-md-2" style="text-align: center"></th>
                    </thead>
                    <tbody>
                    <?php $indice = 1;?>
                        @foreach($prescriptions as $prescription)
                            <tr>
                                <td style="text-align: center">{{$indice++}}</td>
                                <td style="text-transform: capitalize">{{$prescription->client->name . ' ' . $prescription->client->last_name . ' ' . $prescription->client->second_last_name}}</td>
                                <td style="text-align: center">{{$prescription->observation}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary col-md-6" href="{{ url('/prescription/seePrescription/'.$prescription->id) }}">Ver</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!!$prescriptions->render()!!}
            </div>
        <div class="modal-footer">
            <a href="{{ url('home') }}" class="btn btn-primary">Ir al inicio</a>

        </div>
    </div>
    </body>


    @endsection