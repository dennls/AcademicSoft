@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ url('/cursos/registrar') }}" method="post">
                            @csrf
                            <div class="form-group mb-5">
                                <label for="nombre">Nombre curso</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" value="{{ old('imagen') }}" class="form-control">
                                @error('imagen') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="2">{{ old('descripcion') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="costo">Costo</label>
                                <input type="text" name="costo" class="form-control" value="{{ old('costo') }}">
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ url('/cursos') }}" class="btn btn-primary ">Volver al listado</a>
                                <button type="submit" class="btn btn-dark">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
