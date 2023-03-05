@extends('web.layout')



@section('main')
    <div class="row mx-3">

        <a href="/equipos/nuevo">
            <button class="btn btn-dark my-5">
                Nuevo equipo </button> </a>
        @foreach ($equipos as $equipo)
            <div class="card border-light mb-5" style="max-width: 18rem;">
                <div class="card-header">{{ $equipo->nombre }}</div>
                <div class="card-body" style="display: inline-block">
                    <h5 class="card-title">Modalidad: {{ $equipo->modalidad }} VS {{ $equipo->modalidad }}</h5>
                </div>
                <img class="card-img-bottom" src="{{ asset($equipo->imagen) }}" alt="Card image cap">
                <a href="/equipos/{{ $equipo->id }}" class="btn btn-dark">Ver Equipo</a>

                @php
                    $usuarios = $equipo->componentes()->get();
                @endphp

                @foreach ($usuarios as $usuario)
                    @if ($usuario->id == Auth::user()->id)
                        <a href="/equipos/{{ $equipo->id }}/borrar" class="text-center"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></a>
                    @endif
                @endforeach


            </div>
        @endforeach



    </div>
@endsection
