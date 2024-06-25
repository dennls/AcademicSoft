@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/asignaciones/registrar') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="curso_id">Curso </label>
                                    <select name="curso_id" id="" class="form-control">
                                        <option>Seleccione</option>
                                        @foreach ($cursos as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('curso_id') == $item->id) selected @endif>{{ $item->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('curso_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nombre">Asignatura</label>
                                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="importe">Importe</label>
                                    <input type="text" name="importe" class="form-control" value="{{ old('importe') }}">
                                    @error('importe')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea type="text" name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fecha_inicio">Fecha Inicio</label>
                                    <input type="datetime-local" name="fecha_inicio" value="{{ old('fecha_inicio') }}" class="form-control">
                                    @error('fecha_inicio') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="horarioFinal">Fecha Finalizacion</label>
                                    <input type="datetime-local" name="fecha_fin" value="{{ old('fecha_fin') }}" class="form-control">
                                    @error('fecha_fin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ url('/asignaciones') }}" class="btn btn-primary ">Volver al listado</a>
                                <button type="submit" class="btn btn-dark">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datepicker').datepicker({
                startDate: new Date(),
                multidate: true,
                format: "yyyy-mm-dd",
                daysOfWeekHighlighted: "5,6",
                // datesDisabled: ['31/08/2017'],
                language: 'es'
            }).on('changeDate', function(e) {
                // `e` here contains the extra attributes
                $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
            });
        });
    </script>
@endsection
