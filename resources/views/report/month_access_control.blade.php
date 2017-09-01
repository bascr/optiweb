@extends('layouts.app')

@section('content')
    <body class="box-header">
    <div class="panel">
        <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Control de acceso del mes</div>
        <div class="panel-body">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <th class="" style="text-align: center">Nombre de usuario</th>
                    <th class="" style="text-align: left">Nombre</th>
                    <th class="" style="text-align: left">Fecha</th>
                    <th class="" style="text-align: left">Hora entrada</th>
                    <th class="" style="text-align: left">Hora salida</th>
                    </thead>
                    <tbody>
                    @foreach($access_controls as $access_control)
                        <tr>
                            <td style="text-align: center">{{ $access_control->user_username }}</td>
                            <td style="text-transform: capitalize">{{ ucfirst($access_control->user->name) .' '. ucfirst($access_control->user->last_name) .' '. ucfirst($access_control->user->second_last_name) }}</td>
                            <td style="text-transform: capitalize">{{ \Carbon\Carbon::parse($access_control->entry_date)->format('d-m-Y') }}</td>
                            <td style="text-align: left">{{ \Carbon\Carbon::parse($access_control->entry_date)->format('H:i:s') }}</td>
                            <td style="text-align: left">{{ \Carbon\Carbon::parse($access_control->out_date)->format('H:i:s') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $access_controls->links() }}
            </div>
            <div class="col-md-12 modal-footer" style="margin-top: 20px;">
                <a href="{{ url('/report/month_access_control/export') }}" class="btn btn-success"><i class="fa fa-file-excel-o"></i>  Exportar a excel</a>
                <a href="{{ url('home') }}" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </div>
    </body>
@endsection
