<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <!-- Bootstrap 3.3.6  css -->
        {!! Html::style('bootstrap/css/bootstrap-theme.css') !!}
        {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
        <!-- jQuery 2.2.3 -->
        {!! Html::script('bootstrap/js/jquery.min.js') !!}
        <!-- Bootstrap 3.3.6 js -->
        {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary" style="margin: 30px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Solicitud de productos</h3>
                            </div>
                            <div class="panel-body">
                                <div>
                                    {!! $content !!}
                                </div>
                                <div>
                                    <div>
                                        <label class="control-label">Opticas Alarcón</label>
                                    </div>
                                    <div>
                                        <a href="{{ url('http://www.opticasalarcon.cl') }}">www.opticasalarcon.cl</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
