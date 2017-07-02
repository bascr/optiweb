@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="panel">
            <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Estado de recetas</div>
            <div class="panel-body">
                <div style="margin-bottom: 10px;">
                    <label style="margin-bottom: 10px;">Ordenar por:</label><br>
                    <a class="btn btn-primary" href="{{ url('../prescription/state') }}">Estado</a>
                    <a class="btn btn-primary" href="{{ url('../prescription/state/date') }}">Fecha</a>
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
                        @foreach($prescriptions as $prescription)
                            <tr>
                                <td style="text-align: center">{{ Carbon\Carbon::parse($prescription->date)->format('d-m-Y') }}</td>
                                <td style="text-align: center">{{ $prescription->run .'-'. $prescription->digit }}</td>
                                <td style="text-transform: capitalize">{{ $prescription->name . ' ' . $prescription->last_name . ' ' . $prescription->second_last_name }}</td>
                                <td style="text-align: center">{{ $prescription->phone }}</td>
                                <td style="text-align: center">@php if($prescription->state == 1) { echo 'Pendiente'; } else { echo 'En local'; } @endphp</td>
                                <td style="text-align: center">
                                    @php
                                        if($prescription->state == 1) {

                                            echo '<a class="btn btn-warning confirm" href="'.url('../prescription/state/change/'.$prescription->sale_id).'">Cambiar a "en local"</a>';

                                        } else {
                                            echo '<a class="btn btn-success" href="'.url('../prescription/confirm/'.$prescription->sale_id).'">Confirmado</a>';
                                        }
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $prescriptions->render() !!}
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
