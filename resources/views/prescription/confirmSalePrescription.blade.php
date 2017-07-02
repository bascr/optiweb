@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Confirmar pago de receta</div>
                    <div class="panel-body">
<!-- Inicio formulario -->
                    {!! Form::open(['method'=>'POST', 'action'=>'PrescriptionController@prescriptionSale', 'class' => 'form-horizontal', 'id'=>'formToSubmit']) !!}

                    {!! Form::token() !!}
<!-- Campo run -->
                        <div class="form-group">
                            <div>
                                {!! Form::label('run', 'Run', [ 'class' => 'col-md-4 control-label']) !!}
                            </div>

                            <div class="col-xs-6 col-md-4">
                                {!! Form::text('run', $sale->client->run, [ 'class' => 'col-md-4 form-control', 'readonly' => 'true', 'style'=>'background-color:#fff;']) !!}
                            </div>
                            <!-- Campo dígito -->
                            <div class="col-xs-4 col-md-2">
                                {!! Form::text('digit', $sale->client->digit, [ 'class' => 'form-control', 'style'=>'width:40px', 'readonly' => 'true', 'style'=>'background-color:#fff;']) !!}
                            </div>
                        </div>
<!-- Campo nombre -->
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', $sale->client->name. ' '.$sale->client->last_name. ' '.$sale->client->second_last_name, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff;']) !!}
                            </div>
                        </div>
<!-- Campo cristal -->
                        <div class="form-group">
                            {!! Form::label('crystal', 'Cristal', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('crystal', $crystal->material->name.' '.$crystal->crystalTreatment->name, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff;']) !!}
                            </div>
                        </div>
<!-- Campo precio cristal -->
                        <div class="form-group">
                            {!! Form::label('crystal_price', 'Precio cristal', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('crystal_price', $crystal->price, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff; max-width: 100px;']) !!}
                            </div>
                        </div>
<!-- Campo armazón -->
                        <div class="form-group">
                            {!! Form::label('frame', 'Armazón', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('frame', $frame->name, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff;']) !!}
                                <input name="frame_id" type="hidden" value="{{ $frame->id }}" />
                            </div>
                        </div>
<!-- Campo precio armazón -->
                        <div class="form-group">
                            {!! Form::label('frame_price', 'Precio armazón', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('frame_price', $frame->price, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff; max-width: 100px;']) !!}
                            </div>
                        </div>
<!-- Campo total -->
                        <div class="form-group">
                            {!! Form::label('total', 'Total', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('total', $total, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff; max-width: 100px;']) !!}
                            </div>
                        </div>
<!-- Campo abono -->
                        <div class="form-group">
                            {!! Form::label('pay', 'Abono', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('pay', $sale->pay, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff; max-width: 100px;']) !!}
                            </div>
                        </div>
<!-- Campo por pagar -->
                        <div class="form-group">
                            {!! Form::label('toPay', 'Por pagar', [ 'class' => 'col-md-4 control-label', ]) !!}
                            <div class="col-md-6">
                                {!! Form::text('toPay', $toPay, [ 'class' => 'form-control', 'readonly' => 'true', 'style'=>'background-color:#fff; max-width: 100px;']) !!}
                            </div>
                        </div>
                        <input name ="sale_id" type="hidden" value="{{ $sale->id }}"/>
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
                    text: '¿Desea confirmar el pago de la receta?',
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
