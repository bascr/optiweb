@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Editar usuario</div>
                    <div class="panel-body">
<!-- Inicio formulario -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/edit') }}">
                        {{ csrf_field() }}
                            <input type="hidden" name="username" value="{{ $user->username }}"/>
<!-- Campo nombre -->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo apellido paterno -->
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Apellido paterno</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo apellido materno -->
                            <div class="form-group{{ $errors->has('second_last_name') ? ' has-error' : '' }}">
                                <label for="second_last_name" class="col-md-4 control-label">Apellido materno</label>

                                <div class="col-md-6">
                                    <input id="second_last_name" type="text" class="form-control" name="second_last_name" value="{{ $user->second_last_name }}">

                                    @if ($errors->has('second_last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('second_last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo dirección -->
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Dirección</label>

                                <div class="col-md-6">
                                    <input id="address" type="address" class="form-control" name="address" value="{{ $user->address }}">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Droplist comuna -->
                            <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                <label for="district" class="col-md-4 control-label">Comuna</label>

                                <div class="col-md-6">

                                    <select id="district" class="form-control" name="district">
                                        <option value="0">Seleccione comuna</option>
                                        @foreach($districts as $district)
                                            <option @php if($user->district_id == $district->id ){ echo 'selected'; } @endphp value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('district'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo email -->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo teléfono -->
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Teléfono</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}">

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo sueldo base -->
                            <div class="form-group{{ $errors->has('base_wage') ? ' has-error' : '' }}">
                                <label for="base_wage" class="col-md-4 control-label">Sueldo base</label>

                                <div class="col-md-6">
                                    <input id="base_wage" type="text" class="form-control" name="base_wage" value="{{ $user->base_wage }}">

                                    @if ($errors->has('base_wage'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('base_wage') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo valor hora extra -->
                            <div class="form-group{{ $errors->has('overtime_value') ? ' has-error' : '' }}">
                                <label for="overtime_value" class="col-md-4 control-label">Valor hora extra</label>

                                <div class="col-md-6">
                                    <input id="overtime_value" type="text" class="form-control" name="overtime_value" value="{{ $user->overtime_value }}">

                                    @if ($errors->has('overtime_value'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('overtime_value') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Droplist privilegios -->
                            <div class="form-group">
                                <label for="user_type" class="col-md-4 control-label">Privilegios</label>

                                <div class="col-md-6">
                                    <select id="user_type" class="form-control" name="user_type">
                                        @foreach($user_types as $user_type)
                                            <option @php if($user->user_type_id == $user_type->id) { echo 'selected'; } @endphp value="{{ $user_type->id }}">{{ $user_type->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_type_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_type_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Botón registrar -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Editar
                                    </button>
                                    <a href="{{ url('/user/show') }}" class="btn btn-primary">Volver</a>
                                </div>
                            </div>
<!-- cierre formulario -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
