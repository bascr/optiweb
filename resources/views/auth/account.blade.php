@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Activar/Desactivar cuenta</div>
                    <div class="panel-body">
<!-- Inicio formulario -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/edit/account') }}">
                        {{ csrf_field() }}
<!-- Campo nombre de usuario -->
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Nombre de usuario</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" readonly name="username" value="{{ $user->username }}">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo run -->
                            <div class="form-group{{ $errors->has('run') ? ' has-error' : '' }} {{ $errors->has('digit') ? ' has-error' : '' }}">
                                <div>
                                    <label for="run" class="col-md-4 control-label">Run</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="run" type="text" class="form-control" readonly name="run" value="{{ $user->run . '-' . $user->digit }}">

                                    @if ($errors->has('run'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('run') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Campo nombre -->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" readonly name="name" value="{{ $user->name . ' ' . $user->last_name . ' ' .  $user->second_last_name }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('contract_state') ? ' has-error' : '' }}">
                                <label for="contract_state" class="col-md-4 control-label">Estado de la cuenta</label>

                                <div class="col-md-6">
                                    <input id="contract_state" type="text" class="form-control" readonly name="contract_state" value="@php if($user->contract_state == 0) { echo 'La cuenta se encuentra inactiva'; } else { echo 'La cuenta se encuentra activa'; } @endphp">

                                    @if ($errors->has('contract_state'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contract_state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
<!-- Botón registrar -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                @if($user->contract_state == 0)
                                    <input type="hidden" name="contract_state" value="1"/>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-user-circle-o"></i> Activar cuenta
                                    </button>
                                @else
                                    <input type="hidden" name="contract_state" value="0"/>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-ban"></i> Desactivar cuenta
                                    </button>
                                        <a href="{{ url('/user/find') }}" class="btn btn-primary">Volver</a>
                                @endif
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

