@extends('layouts.app')

@section('content')
<body class="box-header">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Marcar hora laboral</div>
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'MarcajeController@index', 'class' => 'form-horizontal']) !!}

                    {!! Form::token() !!}
                    <div class="col-md-12">
                        <div class="col-md-2" ></div>
                        <div class="col-md-8" id="entrada" style="text-align: center;"><h1></h1></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-2" ></div>
                        <div class="col-md-8" style="text-align: center;">
                            <h2>Hora de entrada</h2>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-2" ></div>
                        <div class="col-md-8" id="salida" style="text-align: center;"><h1></h1></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-2" ></div>
                        <div class="col-md-8" style="text-align: center;">
                            <h2>Hora de salida</h2>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-2" ></div>
                        <div class="col-md-8" style="text-align: center;">
                            {!! Form::submit('Marcar', [ 'class' => 'btn btn-primary btn-block' ]) !!}
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</body>
@endsection