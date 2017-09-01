@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de recetas</div>
                    <div class="panel-body">
                        <div class="modal-body">
                            <h4>{{ $message['content'] }}</h4>
                        </div>
                        <div class="modal-footer">
                        @if($message['messageNumber'] == 1)
                            <a href="{{ url('/repair/repairstate') }}" class="btn btn-primary">Aceptar</a>
                        @else
                            <a href="#" class="btn btn-primary" onclick="window.history.back();">Intentarlo nuevamente</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

