@extends('admin.layout')

@section('main')


    <div class="flex row mt-5 mb-5 mx-3 align-content-center justify-content-center">



        <div class="card border-light mb-3" style="max-width: 18rem;">
            <div class="card-header">{{ $juego->nombre }}</div>
            <div class="card-body" style="display: inline-block">
                <h5 class="card-title">Plataforma: {{ $juego->plataforma }}</h5>
                <p class="card-text">{{ $juego->descripcion }}</p>
                <hr>
                @if ($torneos->isNotEmpty())
                    <h5>Torneos asociados</h5>
                    @foreach ($torneos as $torneo)
                        @if ($juego->id == $torneo->juego_id)
                            <p class="card-text">{{ $torneo->nombre }}</p>
                        @endif
                    @endforeach
                @endif
            </div>

            <img class="card-img-bottom" src="{{ asset($juego->imagen) }}" alt="Card image cap">

        </div>


    </div>
@endsection
