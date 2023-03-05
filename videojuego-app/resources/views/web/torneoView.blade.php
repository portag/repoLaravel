@extends('web.layout')


@section('main')
    <div class="flex row mt-5 mb-5 mx-3 align-content-center justify-content-center">

        <div class="card border-light mb-5" style="max-width: 18rem;">
            <div class="card-header">{{ $torneo->nombre }}</div>
            <div class="card-body" style="display: inline-block">
                @foreach ($juegos as $juego)
                    @if ($juego->id == $torneo->juego_id)
                        <h5 class="card-title">Juego: {{ $juego->nombre }}</h5>
                    @endif
                @endforeach
                <p class="card-text">Fecha: {{ $torneo->fecha }}</p>
                <p class="card-text">Modalidad: {{ $torneo->modalidad }}</p>
            </div>
            @foreach ($juegos as $juego)
                @if ($juego->id == $torneo->juego_id)
                    <img class="card-img-bottom" src="{{ asset($juego->imagen) }}" alt="Card image cap">
                @endif
            @endforeach
            {{-- boton para jefe --}}
            <a href="/torneos/{{ $torneo->id }}/inscribir" class="btn btn-dark">Inscribir equipo</a>

        </div>



        <h1 class="text-center mb-4">Equipos participantes </h1>



        @foreach ($equipos as $equipo)
            <div class="card border-light mb-5" style="max-width: 18rem;">
                <div class="card-header">{{ $equipo->nombre }}</div>
                <div class="card-body" style="display: inline-block">
                    <h5 class="card-title">Modalidad: {{ $equipo->modalidad }} VS {{ $equipo->modalidad }}</h5>
                </div>
                <img class="card-img-bottom" src="{{ asset($equipo->imagen) }}" alt="Card image cap">


                {{-- boton para jefe --}}


                <a href="/equipos/{{ $equipo->id }}" class="btn btn-dark">Ver Equipo</a>
                @php
                    $usuarios = $equipo->componentes()->get();
                @endphp

                @foreach ($usuarios as $usuario)
                    @if ($usuario->id == Auth::user()->id)
                        <a href="/torneos/{{ $torneo->id }}/equipos/{{ $equipo->id }}/borrar"
                            class="btn btn-secondary">Desinscribir</a>
                    @endif
                @endforeach

            </div>
        @endforeach



    </div>
@endsection
