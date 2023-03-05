@extends('web.layout')


@section('main')
    <div class="row mx-3">

        <div class="flex row mt-5 mb-5 align-content-center justify-content-center">

            <div class="card border-light mb-3" style="max-width: 18rem;">
                <div class="card-header">{{ $equipo->nombre }}</div>
                <div class="card-body" style="display: inline-block">
                    <h5 class="card-title">Modalidad: {{ $equipo->modalidad }}</h5>
                    @foreach ($jugadores as $elemento)
                        @if (Auth::user()->id == $elemento->id)
                            <p class="card-text">{{ $elemento->nick }} - {{ $elemento->email }}
                                <a href="/equipos/{{ $equipo->id }}/jugadores/{{ Auth::user()->id }}/borrar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                  </svg>
                                </a>
                            </p>
                        @else
                            <p> {{ $elemento->nick }} - {{ $elemento->email }}</p>
                        @endif
                    @endforeach
                </div>

                <img class="card-img-bottom" src="{{ asset($equipo->imagen) }}" alt="Card image cap">
                <a href="/equipos/{{ $equipo->id }}/jugadores/{{ Auth::user()->id }}" class="btn btn-dark">Unirse</a>

            </div>
        </div>
    </div>
@endsection
