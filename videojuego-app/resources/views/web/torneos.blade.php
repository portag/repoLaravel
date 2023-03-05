@extends('web.layout')



@section('main')
    <div class="row mx-3">

        {{-- boton para jefe --}}

        {{-- <a href="/torneos/nuevo/nuevo"><button class="btn btn-dark my-5">Nuevo Torneo</button></a> --}}



        @foreach ($torneos as $torneo)
            <div class="card border-light mt-5 mb-5" style="max-width: 18rem;">
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

                <a href="/torneos/{{ $torneo->id }}" class="btn btn-dark">Ver Torneo</a>
                {{-- boton para jefe --}}

                {{-- <a href="/torneos/{{ $torneo->id }}/borrar" class="text-center"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd"
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg></a> --}}

            </div>
        @endforeach

    </div>
@endsection
