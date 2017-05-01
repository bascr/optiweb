@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registrar venta</div>
                    <div class="panel-body">
                        <div class="modal-body">
                            <h4>{{ $message['content'] }}</h4>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-primary" onclick="window.history.back();">Volver a intentar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
