@extends('admin.layout')


@section('main')
    <div class="mx-3">
        <form action='/equipos/crear' enctype='multipart/form-data' method='POST'>

            @csrf
            <h1 class="text-center">Nuevo equipo</h1>
            <hr class="mx-3">

            <div class='flex row py-3 mt-5 mb-5 align-content-center justify-content-center'>
                <div class='col-3'>
                    <label for="nombre">Nombre:</label><br>
                    <input class="form-control" type="text" name="nombre"><br><br>
                    <label for="nombre">imagen:</label><br>
                    <input class="form-control" type="file" name="imagen"><br><br>
                    <label for="nombre">Modalidad:</label><br>
                    <select class="form-control" name="modalidad" id=""><br>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <input type="hidden" name="estado" value="Abierto">
                    <button class="btn btn-success text-center mt-3" type='submit' name='enviar'
                        texto=''>Crear</button>

                </div>
            </div>

            <hr class="mx-3">

        </form>
    </div>
@endsection
