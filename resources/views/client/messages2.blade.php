@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Registro de cliente</div>
                    <div class="panel-body">
                        <div class="modal-body">
                            <h4>{{ $message['content'] }}</h4>
                        </div>
                        <div class="modal-footer">
                        @if($message['messageNumber'] == 1)
                            <a href="{{ url('/client/list') }}" class="btn btn-primary">Listado de clientes</a>
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

