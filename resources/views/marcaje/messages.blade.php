@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Control de acceso</div>
                    <div class="panel-body">
                        <div class="modal-body">
                            <h4>{{ $message['content'] }}</h4><h2>{{ $message['hora'] }}</h2>
                        </div>
                        <div class="modal-footer">
                        @if($message['messageNumber'] == 1)
                            <a href="{{ url('/home') }}" class="btn btn-primary">Aceptar</a>
                        @else
                            <a href="{{ URL::previous() }}" class="btn btn-primary">Intentarlo nuevamente</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

