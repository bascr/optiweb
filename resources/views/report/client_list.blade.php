@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Cartera de clientes</div>
        <div class="panel-body">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <th class="" style="text-align: center">Run</th>
                    <th class="" style="text-align: left">Nombre</th>
                    <th class="" style="text-align: left">Fecha de nacimiento</th>
                    <th class="" style="text-align: left">Dirección</th>
                    <th class="" style="text-align: left">Email</th>
                    <th class="" style="text-align: left">Teléfono</th>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td style="text-align: center">{{ $client->run .'-'. $client->digit }}</td>
                            <td style="text-transform: capitalize">{{ ucfirst($client->name) .' '. ucfirst($client->last_name) .' '. ucfirst($client->second_last_name) }}</td>
                            <td style="text-transform: capitalize">{{ \Carbon\Carbon::parse($client->birth_date)->format('d-m-Y') }}</td>
                            <td style="text-align: left">{{ $client->address .', '. $client->district->name }}</td>
                            <td style="text-align: left">{{ $client->email }}</td>
                            <td style="text-align: left">{{ $client->phone }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $clients->links() }}
            </div>
            <div class="col-md-12 modal-footer" style="margin-top: 20px;">
                <a href="{{ url('/report/client_list/export') }}" class="btn btn-success"><i class="fa fa-file-excel-o"></i>  Exportar a excel</a>
                <a href="{{ url('home') }}" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </div>
    </body>
@endsection
