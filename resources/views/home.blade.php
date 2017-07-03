@extends('layouts.app')

@section('content')
    <body class="box-header">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $cantidad }}</h3>

                    <p>Recetas del día</p>
                </div>
                <div class="icon">
                    <i class="ion-android-clipboard"></i>
                </div>
                <a href="{{url('/prescription/listToDay')}}" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua-active">
                <div class="inner">
                    <h3>{{ $retired_prescriptions }}</h3>

                    <p>Recetas retiradas del día</p>
                </div>
                <div class="icon">
                    <i class="ion-android-clipboard"></i>
                </div>
                <a href="{{url('/prescription/listToDay/RetiredPrescription')}}" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $sales }}<sup style="font-size: 20px"></sup></h3>

                    <p>Ventas del día</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ url('/article_sale/list_today') }}" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $client }}</h3>

                    <p>Clientes registrados en el día</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('/client/listToDay')}}" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>
    <div class="box-header">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="text-align: center; height: 50px"></div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="panel panel-default" style="background-color: rgba(0,0,255,0.1)">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"  style="text-align: center; text-transform: none"><h1>{{$mensaje}}</h1></div>
            <div class="col-md-2"></div>
        </div>
    </div>
    </body>
@endsection
