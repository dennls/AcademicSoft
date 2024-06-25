@extends('layouts.app')

@section('content')
    {{-- <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cursos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Cursos</li>
                </ol>
            </div>
        </div>
    </div>
</div> --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @if (Auth::user()->tipo == 'Administrador')
                                <div class="text-end">
                                    <a href="{{ url('/cursos/registrar') }}" class="btn btn-dark text-end btn-sm">Agregar
                                        curso</a>
                                </div>
                            @endif


                            <div class="table-responsive mt-3">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE</th>
                                            <th>IMAGEN</th>
                                            <th>DESCRIPCION</th>
                                            <th>COSTO</th>
                                            <th>ESTADO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cursos as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->nombre }}</td>
                                                <td class="text-center">
                                                    <img src="{{ $item->getImagenUrl() }}" alt="" class="border"
                                                        height="40px">
                                                </td>
                                                <td>{{ $item->descripcion }}</td>
                                                <td>{{ $item->costo }}</td>
                                                <td>
                                                    @if ($item->estado == true)
                                                        <span class="badge bg-success">Activo</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactivo</span>
                                                    @endif
                                                </td>
                                                @if (Auth::user()->tipo == 'Administrador')
                                                    <td>
                                                        <a href="{{ url('/cursos/actualizar/' . $item->id) }}"
                                                            class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        @if ($item->estado == true)
                                                            <a href="{{ url('/cursos/estado/' . $item->id) }}"
                                                                class="btn btn-warning"><i class="fas fa-ban"></i></a>
                                                        @else
                                                            <a href="{{ url('/cursos/estado/' . $item->id) }}"
                                                                class="btn btn-success"><i class="fas fa-check"></i></a>
                                                        @endif
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="{{ url('/cursos/reserva/' . $item->id) }}"
                                                            class="btn btn-info"><i class="fa fa-calendar"></i></a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $cursos->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
