@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="panel">
            <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Estado de recetas</div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <th style="text-align: center">Fecha</th>
                    <th style="text-align: center;">Run</th>
                    <th style="text-align: left;">Nombre</th>
                    <th style="text-align: center">Estado</th>
                    <th style="text-align: center">Acción</th>
                    </thead>
                    <tbody>
                    @foreach($prescriptions as $prescription)
                        <tr>
                            <td style="text-align: center">{{ $prescription->date }}</td>
                            <td style="text-align: center">{{ $prescription->run .'-'. $prescription->digit }}</td>
                            <td style="text-transform: capitalize">{{ $prescription->name . ' ' . $prescription->last_name . ' ' . $prescription->second_last_name }}</td>
                            <td style="text-align: center">@php if($prescription->state == 1) { echo 'Pendiente'; } else { echo 'En local'; } @endphp</td>
                            <td style="text-align: center">
                                @php
                                    if($prescription->state == 1) {

                                        echo '<a class="btn btn-warning" href="../prescription/state/change'.$prescription->sale_id.'">Cambar a "en local"</a>';

                                    } else {
                                        echo '<a class="btn btn-warning" href="../prescription/state/confirm'.$prescription->sale_id.'">Confirmar a cliente</a>';
                                    }
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $prescriptions->render() !!}
            </div>
            <div class="modal-footer">
                <a href="{{ url('home') }}" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </div>
@endsection
