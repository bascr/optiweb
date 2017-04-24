@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
<<<<<<< HEAD
            <div class="col-md-12">
=======
            <div class="col-md-8 col-md-offset-2">
>>>>>>> 3fc7fea37be34257a83a5d12c731d7a427d90a0e
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Realizar pedido</div>
                    <div class="panel-body">
<!-- Inicio formulario -->
                        {!! Form::open(['method'=>'POST', 'action'=>'SupplierController@sendRequest', 'class' => 'form-horizontal']) !!}

                        {!! Form::token() !!}
<<<<<<< HEAD
<!-- Droplist marca -->
=======
<!-- Droplist proveedor -->
>>>>>>> 3fc7fea37be34257a83a5d12c731d7a427d90a0e
                            <div class="form-group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                                <label for="supplier" class="col-md-2 control-label">Proveedor</label>

                                <div class="col-md-6">

                                    <select id="supplier" class="form-control" name="supplier">
                                        <option value="0" selected>Seleccione proveedor</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('supplier'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('supplier') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo titulo -->
                            <div class="form-group {{$errors->has('subject') ? 'has-error' : ''}}">
                                {!! Form::label('subject', 'Asunto', [ 'class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('subject', null, [ 'class' => 'col-md-4 form-control']) !!}
                                    @if ($errors->has('subject'))
                                        <span class="help-block">
                                                 <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo Content -->
                            <div class="form-group {{$errors->has('mail_content') ? 'has-error' : ''}}">
                                {!! Form::label('mail_content', 'Contenido', [ 'class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('mail_content', null, [ 'class' => 'col-md-4 form-control']) !!}
                                    @if ($errors->has('mail_content'))
                                        <span class="help-block">
                                             <strong>{{ $errors->first('mail_content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
<!-- Botones -->
                            <div class="modal-footer">
                                <div style="text-align: center;">
                                    {!! Form::submit('Enviar', [ 'class' => 'btn btn-primary' ]) !!}
                                </div>
                            </div>
<!-- cierre formulario -->
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
