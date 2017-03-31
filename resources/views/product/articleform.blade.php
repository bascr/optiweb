@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Ingreso de artículo</div>
                    <div class="panel-body">
<!-- Inicio formulario -->
                    {!! Form::open(['method'=>'POST', 'action'=>'ProductController@createArticle', 'class' => 'form-horizontal']) !!}

                    {!! Form::token() !!}
<!-- Campo nombre -->
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), [ 'class' => 'col-md-4 form-control']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- Droplist categoría -->
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Categoría</label>

                            <div class="col-md-6">

                                <select id="category" class="form-control" name="category">
                                    <option value="0" selected>Seleccione categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- Campo descripción -->
                        <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                            {!! Form::label('description', 'Descripción', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('description', old('description'), [ 'class' => 'form-control']) !!}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- Droplist marca -->
                        <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                            <label for="brand" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">

                                <select id="brand" class="form-control" name="brand">
                                    <option value="0" selected>Seleccione marca</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- Droplist proveedor -->
                        <div class="form-group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                            <label for="supplier" class="col-md-4 control-label">Proveedor</label>

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
<!-- Campo precio -->
                        <div class="form-group {{$errors->has('price') ? 'has-error' : ''}}">
                            {!! Form::label('price', 'Precio', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('price', old('price'), [ 'class' => 'form-control', 'style'=>'width:150px']) !!}
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- Campo unidades -->
                        <div class="form-group {{$errors->has('quantity') ? 'has-error' : ''}}">
                            {!! Form::label('quantity', 'Unidades', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('quantity', old('quantity'), [ 'class' => 'form-control','style'=>'width:150px']) !!}
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
                                {!! Form::submit('Ingresar', [ 'class' => 'btn btn-primary' ]) !!}
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
