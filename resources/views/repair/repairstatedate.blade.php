@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="panel">
            <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Estado de reparaciones</div>
            <div class="panel-body">
                <div style="margin-bottom: 10px;">
                    <label style="margin-bottom: 10px;">Ordenar por:</label><br>
                    <a class="btn btn-primary" href="{{ url('/repair/repairstate') }}">Estado</a>
                    <a class="btn btn-primary" href="{{ url('/repair/repairstatedate') }}">Fecha</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <th style="text-align: center">Fecha</th>
                        <th style="text-align: center;">Run</th>
                        <th style="text-align: left;">Nombre</th>
                        <th style="text-align: center;">Teléfono</th>
                        <th style="text-align: center">Estado</th>
                        <th style="text-align: center">Acción</th>
                        </thead>
                        <tbody>
                        @foreach($repairServices as $repairService)
                            <tr>
                                <td style="text-align: center">{{ Carbon\Carbon::parse($repairService->created_at)->format('d-m-Y') }}</td>
                                <td style="text-align: center">{{ $repairService->run .'-'. $repairService->digit }}</td>
                                <td style="text-transform: capitalize">{{ $repairService->name . ' ' . $repairService->last_name . ' ' . $repairService->second_last_name }}</td>
                                <td style="text-align: center">{{ $repairService->phone }}</td>
                                <td style="text-align: center">@php if($repairService->state == 1) { echo 'Pendiente'; } else { echo 'En local'; } @endphp</td>
                                <td style="text-align: center">
                                    @php
                                        if($repairService->state == 1) {

                                            echo '<a class="btn btn-warning confirm" href="'.url('/repair/repairstate/change/'.$repairService->id).'">Cambiar a "en local"</a>';

                                        } else {
                                            echo '<a class="btn btn-success" href="'.url('/repair/confirm/'.$repairService->id).'">Confirmado</a>';
                                        }
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $repairServices->render() !!}
            </div>
            <div class="modal-footer">
                <a href="{{ url('home') }}" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.confirm').click(function(event) {
                var buttonUrl = $(this).attr('href');
                event.preventDefault();
                swal({
                        title: '¿Desea confirmar la receta a: "En Local"?',
                        text: 'Se enviará un email de confirmación al cliente',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#6694dd',
                        confirmButtonText: 'Si, confirmar!',
                        closeOnConfirm: false
                    },
                    function(isConfirm){
                        if(isConfirm) {
                            swal('Confirmado!', 'Enviando email de confirmación.', 'success');
                            window.location = buttonUrl;
                        }
                    }
                );
            });
        });
    </script>
@endsection
