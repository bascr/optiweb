@extends('layouts.app')
@section('content')
    <body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Listado de recetas de: <h3 class="text-capitalize">{{$nombre}}</h3></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <th class="col-md-2" style="text-align: center">Fecha</th>
                        <th class="col-md-8" style="text-align: center">Observación</th>
                        <th class="col-md-2" style="text-align: center"></th>
                    </thead>
                    <tbody>
                        @foreach($listado as $presc)
                            <tr>
                                <td style="text-align: center">{{ \Carbon\Carbon::parse($presc->created_at)->format('d-m-Y')}}</td>
                                <td>{{$presc->observation}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('/prescription/seePrescription/'.$presc->id) }}">Abrir</a>
                                    <a class="btn btn-primary" href="{{ url('/prescription/update/'.$presc->id) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!!$listado->render()!!}
            </div>
    </div>
    </body>


    @endsection