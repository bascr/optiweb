@extends('layouts.app')
@section('content')
    <body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Listado de clientes</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th style="text-align: center">Numero</th>
                            <th style="text-align: left">Nombre</th>
                            <th style="text-align: center">Fono</th>
                            <th style="text-align: center">Email</th>
                            <th>Ver</th>
                            <th>Editar</th>
                        </thead>
                        <tbody>
                        <?php $indice = 1;?>
                        @foreach($listado as $client)
                            <tr>
                                <td style="text-align: center">{{$indice++}}</td>
                                <td style="text-transform: capitalize">{{$client->last_name . ' ' . $client->second_last_name . ' ' .$client->name}}</td>
                                <td style="text-align: center">{{$client->phone}}</td>
                                <td style="text-align: center">{{$client->email}}</td>
                                <td style="text-align: center"><a class="btn btn-primary col-md-6" href="{{ url('/client/seeClient/'.$client->run) }}">Abrir</a></td>
                                <td style="text-align: center"><a class="btn btn-primary col-md-6" href="{{ url('/client/update/'.$client->run) }}">Editar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!!$listado->render()!!}
                </div>
            </div>
    </div>
    </body>


    @endsection