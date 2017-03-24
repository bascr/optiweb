@extends('layouts.app')

@section('content')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registro de cliente</div>
                        <div class="panel-body">
                            {!! Form::open(['method'=>'', 'action'=>'']) !!}
                            {!! Form::token() !!}
                                    <div class="form-group {{$error->has('run') ? 'has_error' : ''}}">

                                        {!! Form::label('run', 'Run', [ 'class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-3">
                                            {!! Form::text('run', null, [ 'class' => 'form-control']) !!}
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        {!! Form::submit('', []) !!}
                                    </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
