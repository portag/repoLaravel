@extends('web.layout')

@section('main')
    <form action='/torneos/store' enctype='multipart/form-data' method='POST'>

        @csrf
        <h1 class="text-center">Nuevo torneo</h1>
        <hr class="mx-3">
        <div class='flex row py-3 mt-5 mb-5 align-content-center justify-content-center'>
            <div class='col-3'>
                <label for="nombre">Nombre:</label><br>
                <input class="form-control" type="text" name="nombre"><br><br>
                <label for="fecha">Fecha:</label><br>
                <input class="form-control" type="date" name="fecha"><br><br>
                <label for="max_equipos">Maximo equipos:</label><br>
                <select class="form-control" name="max_equipos"><br><br>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <label for="modalidad">Modalidad:</label><br>
                <input class="form-control" type="text" name="modalidad" placeholder="Numero..."><br><br>
                <input type="hidden" name="estado" value="activo">
                <label for="nivel">Nivel:</label><br>
                <select class="form-control" name="nivel"><br><br>
                    <option value="principiante">principiante</option>
                    <option value="intermedio">intermedio</option>
                    <option value="alto">alto</option>
                </select>
                <label for="juego_id" class="form-label">Juego</label><br>
                <select class="form-control" class="form-select" name="juego_id"><br><br>
                    @foreach ($juegos as $juego)
                        <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                    @endforeach
                </select>
                <button class="mt-3 btn btn-dark" type='submit' name='enviar' texto='' value='crear'>Crear</button>

            </div>
        </div>
        <hr class="mx-3">


    </form>
@endsection
