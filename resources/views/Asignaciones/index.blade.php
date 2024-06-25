@extends('layouts.app')

@section('content')

{{-- <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Asignaciones</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Asignaciones</li>
                </ol>
            </div>
        </div>
    </div>
</div> --}}


<div class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-end">
                        <a href="{{ url('/asignaciones/registrar') }}" class="btn btn-dark text-end btn-sm">Nueva asignacion</a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>DESCRIPCION</th>
                                <th>FECHA INICIO</th>
                                <th>FECHA FIN</th>
                                <th>USUARIO</th>
                                <th>CURSO</th>
                                <th>IMPORTE</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asignaciones as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td>
                                        {{ $item->fecha_inicio}} <br>
                                        <small>{{ \Carbon\Carbon::parse($item->fecha_inicio)->diffForHumans(now()) }}</small>
                                    </td>
                                    <td>
                                        {{ $item->fecha_fin}} <br>
                                        <small>{{ \Carbon\Carbon::parse($item->fecha_fin)->diffForHumans(now()) }}</small>
                                    </td>
                                    <td>{{ $item->usuario->name }}</td>
                                    <td>{{ $item->curso->nombre }}</td>
                                    <td>{{ $item->importe }}</td>
                                    <td>
                                        @if ($item->estado == true)
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-danger">Inactivo</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->usuario->name }}</td>
                                    <td>
                                        <a href="{{ url('/asignaciones/ver/' . $item->id) }}" class="btn btn-dark btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/asignaciones/actualizar/' . $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if ($item->estado == true)
                                            <a href="{{ url('/asignaciones/estado/' . $item->id) }}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-ban"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('/asignaciones/estado/' . $item->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="{{ url('/asignaciones/eliminar/' . $item->id) }}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $asignaciones->links("pagination::bootstrap-5") }}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
