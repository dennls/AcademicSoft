@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/tareas/registrar') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="asignacion_id">Asignacion </label>
                                    <select name="asignacion_id" id="" class="form-control">
                                        <option>Seleccione</option>
                                        @foreach ($asignaciones as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('asignacion_id') == $item->id) selected @endif>{{ $item->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('asignacion_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nota">Nota</label>
                                    <input type="text" name="nota" class="form-control" value="{{ old('nota') }}">
                                    @error('nota')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fecha_entrega">Fecha Entrega</label>
                                    <input type="datetime-local" name="fecha_entrega" value="{{ old('fecha_entrega') }}" class="form-control">
                                    @error('fecha_entrega') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea type="text" name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ url('/tareas') }}" class="btn btn-primary ">Volver al listado</a>
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
