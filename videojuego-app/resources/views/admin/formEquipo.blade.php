@extends('admin.layout')


@section('main')
    <div class="mx-3">
        <form action='/torneos/{{ $torneo->id }}/registrar' enctype='multipart/form-data' method='POST'>

            @csrf
            <h1 class="text-center">Inscribir equipo</h1>
            <hr class="mx-3">
            <div class='flex row mt-5 mb-5 align-content-center justify-content-center'>
                <div class='col-3'>
                    <div class="mb-3 p-2">
                        <label class="text-center" for="grupo" class="form-label">ELIGE EQUIPO</label>
                        <select class="form-select" name="equipo">
                            @foreach ($equipos as $equipo)
                                @if ($equipo->modalidad == $torneo->modalidad)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <button class="btn btn-success" type='submit' name='enviar' texto='' value='registrar'>
                        registrar
                    </button>

                </div>

            </div>


        </form>
        <hr class="mx-3">
    </div>
@endsection
