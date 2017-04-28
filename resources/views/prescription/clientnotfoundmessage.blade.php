@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Buscar cliente</div>
                    <div class="panel-body">
                        <div class="modal-body">
                            <h4>El run ingresado no se encuentra registrado.</h4>
                        </div>
                        <div class="modal-footer">
                                <a href="{{ url('/prescription') }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
