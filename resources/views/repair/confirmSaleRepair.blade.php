@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Confirmar pago de reparación</div>
                    <div class="panel-body">
<!-- Inicio formulario -->
                    {!! Form::open(['method'=>'POST', 'action'=>'RepairController@repairSale', 'class' => 'form-horizontal', 'id'=>'formToSubmit']) !!}

                    {!! Form::token() !!}
<!-- Campo run -->
                        <div class="form-group">
                            <div>
                                {!! Form::label('run', 'Run', [ 'class' => 'col-md-4 control-label']) !!}
                            </div>

                            <div class="col-xs-6 col-md-4">
                                {!! Form::text('run', $repairServices[0]->client_run, [ 'class' => 'col-md-4 form-control', 'readonly' => 'true', 'style'=>'background-color:#fff;']) !!}
                            </div>
                            <!-- Campo dígito -->
                            <div class="col-xs-4 col-md-2">
                                {!! Form::text('digit', $repairServices[0]->digit, [ 'class' => 'form-control', 'style'=>'width:40px', 'readonly' => 'true', 'style'=>'background-color:#fff;']) !!}
                            </div>
                        </div>
<!-- Campo nombre -->
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', ucfirst($repairServices[0]->name). ' '.ucfirst($repairServices[0]->last_name). ' '.ucfirst($repairServices[0]->second_last_name), [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff;']) !!}
                            </div>
                        </div>
<!-- Campo articulos -->
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <th><h6>Cod.</h6></th>
                                    <th><h6>Articulo</h6></th>
                                    <th><h6>Cantidad</h6></th>
                                    <th><h6>Precio unitario</h6></th>
                                </tr>
                                @for($i = 0; $i < count($articles); $i++ )
                                    <tr>
                                        <th><h6>{{ $articles[$i]->id }}</h6></th>
                                        <th><h6>{{ ucfirst($articles[$i]->name) }}</h6></th>
                                        <th><h6>{{ $articles[$i]->quantity }}</h6></th>
                                        <th><h6>{{ $articles[$i]->price }}</h6></th>
                                    </tr>
                                @endfor
                            </table>
                        </div>
<!-- Campo precio mano de obra -->
                        <div class="form-group">
                            {!! Form::label('price', 'Precio mano de obra', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('price', $repairServices[0]->price, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff; max-width: 100px;']) !!}
                            </div>
                        </div>
<!-- Campo total precio a pagar -->
                        <div class="form-group">
                            {!! Form::label('toPay', 'Total', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('toPay', $toPay, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff; max-width: 100px;']) !!}
                            </div>
                        </div>
                        <input name ="id" type="hidden" value="{{ $repairServices[0]->id }}"/>
<!-- Botones -->
                        <div class="modal-footer">
                            <button class="btn btn-primary">Registrar venta</button>
                            <a href="#" class="btn btn-primary" onclick="window.history.back();">Volver</a>
                        </div>
                        <!-- cierre formulario -->
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelector('#formToSubmit').addEventListener('submit', function(event) {
            event.preventDefault();
            swal({
                    title: 'Pago',
                    text: '¿Desea confirmar el pago de la reparación?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6694dd',
                    confirmButtonText: 'Si, confirmar!',
                    closeOnConfirm: false
                },
                function(isConfirm){
                    if(isConfirm) {
                        swal({
                            title: 'Confirmado!',
                            text: 'Se ha efectuado el pago.',
                            type: 'success'
                        }, function() {
                            $('#formToSubmit').submit();
                        });
                    }
                }
            );
        });
    </script>
@endsection
