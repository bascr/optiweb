@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de usuario</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Apellido paterno</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('second_last_name') ? ' has-error' : '' }}">
                                <label for="second_last_name" class="col-md-4 control-label">Apellido materno</label>

                                <div class="col-md-6">
                                    <input id="second_last_name" type="text" class="form-control" name="second_last_name" value="{{ old('second_last_name') }}">

                                    @if ($errors->has('second_last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('second_last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('run') ? ' has-error' : '' }} {{ $errors->has('digit') ? ' has-error' : '' }}">
                                <label for="run" class="col-md-4 control-label">Run</label>

                                <div class="col-md-3">
                                    <input id="run" type="text" class="form-control" name="run" value="{{ old('run') }}">

                                    @if ($errors->has('run'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('run') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-1">

                                    <input id="digit" type="text" class="form-control" name="digit" value="{{ old('digit') }}">

                                    @if ($errors->has('digit'))
                                        <span class="help-block"><strong>{{ $errors->first('digit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Dirección</label>

                                <div class="col-md-6">
                                    <input id="address" type="address" class="form-control" name="address" value="{{ old('address') }}">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                <label for="district" class="col-md-4 control-label">Comuna</label>

                                <div class="col-md-6">

                                    <select id="district" class="form-control" name="district">
                                        <option value="0" selected>Seleccione comuna</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('district'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Teléfono</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Nombre de usuario</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contract_state" class="col-md-4 control-label">Contrato</label>

                                <div class="col-md-6">
                                    <select id="contract_state" class="form-control" name="contract_state">
                                        <option value="0">No vigente</option>
                                        <option value="1">Vigente</option>
                                    </select>

                                    @if ($errors->has('contract_state'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contract_state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('base_wage') ? ' has-error' : '' }}">
                                <label for="base_wage" class="col-md-4 control-label">Sueldo base</label>

                                <div class="col-md-6">
                                    <input id="base_wage" type="text" class="form-control" name="base_wage" value="{{ old('base_wage') }}">

                                    @if ($errors->has('base_wage'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('base_wage') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('overtime_value') ? ' has-error' : '' }}">
                                <label for="overtime_value" class="col-md-4 control-label">Valor hora extra</label>

                                <div class="col-md-6">
                                    <input id="overtime_value" type="text" class="form-control" name="overtime_value" value="{{ old('overtime_value') }}">

                                    @if ($errors->has('overtime_value'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('overtime_value') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user_type" class="col-md-4 control-label">Privilegios</label>

                                <div class="col-md-6">
                                    <select id="user_type" class="form-control" name="user_type">
                                        @foreach($type_users as $type_user)
                                            <option value="{{ $type_user->id }}">{{ $type_user->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_type_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_type_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
