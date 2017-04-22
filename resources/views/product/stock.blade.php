@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Añadir stock</div>
                    <div class="panel-body">
                        <!-- Inicio formulario -->
                            {!! Form::open(['method'=>'POST', 'action'=>'ProductController@addStock', 'class' => 'form-horizontal']) !!}

                            {!! Form::token() !!}
                            <input type="hidden" name="id" value="{{ $product->productable_id }}" />
                            <!-- Campo nombre -->
                            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                {!! Form::label('name', 'Nombre producto', [ 'class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', $product->productable->name, [ 'class' => 'col-md-4 form-control', 'readonly'=>'true']) !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                         <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Campo unidades -->
                            <div class="form-group {{$errors->has('quantity') ? 'has-error' : ''}}">
                                {!! Form::label('quantity', 'Unidades', [ 'class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::number('quantity', 0, [ 'class' => 'form-control','style'=>'width:150px']) !!}
                                    @if ($errors->has('quantity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Botones -->
                            <div class="modal-footer">
                                <div style="text-align: center;">
                                    {!! Form::submit('Añadir stock', [ 'class' => 'btn btn-primary' ]) !!}
                                    <a href="{{ url('/product') }}" class="btn btn-primary">Volver</a>
                                </div>
                            </div>
                            <!-- cierre formulario -->
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
