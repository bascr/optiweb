@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de proveedores</div>
                    <div class="panel-body">
                        <div class="modal-body">
                            <h4>Su mensaje se ha enviado exitosamente.</h4>
                        </div>
                        <div class="modal-footer">
                                <a href="{{ url('/home') }}" class="btn btn-primary">Ir al inicio</a>
                                <a href="{{ url('/supplier/request') }}" class="btn btn-primary">Enviar otro correo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
