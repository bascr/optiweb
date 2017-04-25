@extends('layouts.app')

@section('content')
    <div class="box-header">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading" style="color: #fff;background-color: #3C8DBC;">Listado de usuarios</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center;">
                                <tr>
                                    <th>Run</th>
                                    <th>Nombre</th>
                                    <th>Nombre de usuario</th>
                                    <th>Privilegios</th>
                                    <th>Estado del contrato</th>
                                    <th>Email</th>
                                    <th>Editar</th>
                                </tr>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->run }}-{{$user->digit}}</td>
                                        <td>{{ $user->name .' '. $user->last_name.' '. $user->second_last_name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>@php if($user->user_type_id == 1) { echo 'Usuario';} else { echo 'Administrador';} @endphp</td>
                                        <td>@php if($user->contract_state == 0) { echo 'No vigente';} else { echo 'Vigente';} @endphp</td>
                                        <td>{{ $user->email }}</td>
                                        <td><a class="btn btn-primary" href="/user/edit/{{ $user->username }}">Editar</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $users->links() }}
                        </div>
                        <div class="panel-body">
                            <div class="modal-footer">
                                <a href="{{ url('/home') }}" class="btn btn-primary">Ir al inicio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
