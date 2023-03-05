@extends('web.layout')


@section('main')
    <form action='/juegos/crear' enctype='multipart/form-data' method='POST'>

        @csrf
        <h1 class="text-center">Nuevo juego</h1>
        <hr class="mx-3">
        <div class='flex row py-3 mt-5 mb-5 align-content-center justify-content-center'>
            <div class='col-3'>
                <label for="nombre">Nombre:</label><br>
                <input class="form-control" type="text" name="nombre"><br><br>
                <label for="plataforma">Plataforma:</label><br>
                <input class="form-control" type="text" name="plataforma"><br><br>
                <label for="imagen">Imagen:</label><br>
                <input class="form-control" type="file" name="imagen"><br><br>
                <label for="descripcion">Descripcion:</label><br>
                <textarea class="form-control" name="descripcion" id="" cols="30" rows="4"></textarea><br>
                <button class="btn btn-dark" type='submit' name='enviar' texto=''>Crear</button>
            </div>
        </div>
        <hr class="mx-3">
        

    </form>
@endsection