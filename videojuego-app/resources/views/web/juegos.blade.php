@extends('web.layout')



@section('main')
    <div class="my-5 mx-3 row">
        {{-- boton para jefe --}}

        {{-- <a href="/juegos/nuevo/nuevo"><button class="btn btn-dark">Nuevo juego</button></a> --}}

        

            @foreach ($juegos as $juego)
          
                <div class="card border-light mb-5" style="max-width: 18rem;">
                    <div class="card-header">{{ $juego->nombre }}</div>
                    <div class="card-body" style="display: inline-block">
                        <h5 class="card-title">Plataforma: {{ $juego->plataforma }}</h5>
                        <p>{{$juego->descripcion}}</p>
                        @if (!empty($torneos))
                            <p>TORNEOS ASOCIADOS: </p>
                            <ul>
                                @foreach ($torneos as $torneo)
                                    @if ($juego->id == $torneo->juego_id)
                                        <li> {{ $torneo->nombre }}</li>
                                    @endif
                                @endforeach
                            <ul>
                        @endif
                    </div>
                    <img class="card-img-bottom" src="{{ asset($juego->imagen) }}" alt="Card image cap">
                    <a class="btn btn-dark" href="/juegos/{{ $juego->id }}">Ver detalle</a>
                    {{-- <a class="btn btn-secondary" href="/juegos/{{ $juego->id }}/borrar"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash text-center" viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd"
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg></a> --}}
                </div>

            @endforeach
    </div>

    {{-- <div class="my-5">
        @foreach ($juegos as $juego)
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $juego->nombre }}</h5>
                    <p class="card-text">{{ $juego->descripcion }}</p>
                    <p class="card-text">{{ $juego->plataforma }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div> --}}
@endsection
