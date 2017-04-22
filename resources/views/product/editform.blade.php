@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">@php if($product->productable_type == 'App\Article') { echo 'Editar artículo'; } else { echo 'Editar marco'; } @endphp </div>
                    <div class="panel-body">
                @if($product->productable_type == 'App\Article')
<!-- Inicio formulario -->
                    {!! Form::open(['method'=>'POST', 'action'=>'ProductController@updateArticle', 'class' => 'form-horizontal']) !!}

                    {!! Form::token() !!}
                        <input type="hidden" name="id" value="{{ $product->productable_id }}" />
<!-- Campo nombre -->
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', $product->productable->name, [ 'class' => 'col-md-4 form-control']) !!}
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
                                    <option value="0">Seleccione categoría</option>
                                    @foreach($categories as $category)
                                        <option @php if($product->productable->category_id == $category->id ){ echo 'selected'; } @endphp value="{{ $category->id }}">{{ $category->name }}</option>
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
                                {!! Form::text('description', $product->productable->description, [ 'class' => 'form-control']) !!}
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
                                    <option value="0">Seleccione marca</option>
                                    @foreach($brands as $brand)
                                        <option @php if($product->brand_id == $brand->id ){ echo 'selected'; } @endphp value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                    <option value="0">Seleccione proveedor</option>
                                    @foreach($suppliers as $supplier)
                                        <option @php if($product->supplier_id == $supplier->id ){ echo 'selected'; } @endphp value="{{ $supplier->id }}">{{ $supplier->name }}</option>
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
                                {!! Form::number('price', $product->productable->price, [ 'class' => 'form-control', 'style'=>'width:150px']) !!}
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- Botones -->
                        <div class="modal-footer">
                            <div style="text-align: center;">
                                {!! Form::submit('Editar', [ 'class' => 'btn btn-primary' ]) !!}
                                <a href="{{ url('/product') }}" class="btn btn-primary">Volver</a>
                            </div>
                        </div>
<!-- cierre formulario -->
                        {!! Form::close() !!}
                    @endif
                    @if($product->productable_type == 'App\Frame')
<!-- Inicio formulario -->
                        {!! Form::open(['method'=>'POST', 'action'=>'ProductController@updateFrame', 'class' => 'form-horizontal']) !!}

                        {!! Form::token() !!}
                            <input type="hidden" name="id" value="{{ $product->productable_id }}" />
<!-- Campo nombre -->
                            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                {!! Form::label('name', 'Nombre', [ 'class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', $product->productable->name, [ 'class' => 'col-md-4 form-control']) !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                         <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Droplist modelo -->
                            <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                                <label for="model" class="col-md-4 control-label">Tipo de marco</label>

                                <div class="col-md-6">

                                    <select id="model" class="form-control" name="model">
                                        <option value="0">Seleccione tipo</option>
                                        @foreach($models as $model)
                                            <option @php if($product->productable->model_id == $model->id ){ echo 'selected'; } @endphp value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('model'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Droplist color -->
                            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                <label for="color" class="col-md-4 control-label">Color</label>

                                <div class="col-md-6">

                                    <select id="color" class="form-control" name="color">
                                        <option value="0">Seleccione color</option>
                                        @foreach($colors as $color)
                                            <option @php if($product->productable->color_id == $color->id ){ echo 'selected'; } @endphp value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('color'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Droplist marca -->
                            <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                <label for="brand" class="col-md-4 control-label">Marca</label>

                                <div class="col-md-6">

                                    <select id="brand" class="form-control" name="brand">
                                        <option value="0">Seleccione marca</option>
                                        @foreach($brands as $brand)
                                            <option @php if($product->brand_id == $brand->id ){ echo 'selected'; } @endphp value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                        <option value="0">Seleccione proveedor</option>
                                        @foreach($suppliers as $supplier)
                                            <option @php if($product->supplier_id == $supplier->id ){ echo 'selected'; } @endphp value="{{ $supplier->id }}">{{ $supplier->name }}</option>
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
                                    {!! Form::number('price', $product->productable->price, [ 'class' => 'form-control', 'style'=>'width:150px']) !!}
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Botones -->
                            <div class="modal-footer">
                                <div style="text-align: center;">
                                    {!! Form::submit('Editar', [ 'class' => 'btn btn-primary' ]) !!}
                                    <a href="{{ url('/product') }}" class="btn btn-primary">Volver</a>
                                </div>
                            </div>
<!-- cierre formulario -->
                            {!! Form::close() !!}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
