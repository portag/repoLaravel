@extends('admin.layout')



@section('main')
    <div class="my-5 mx-3">
        {{-- boton para jefe --}}

        <a href="/juegos/nuevo/nuevo"><button class="btn btn-success">Nuevo juego</button></a>

        <table class='table table-striped mt-5' style='font-size: 15px;align-items: center;' id='dataTable' width='100%'
            cellspacing='0'>
            <tr>
                <th> NOMBRE </th>
                <th> PLATAFORMA </th>
                <th> IMAGEN </th>
                <th> DESCRIPCION </th>
                <th> DETALLE</th>

                {{-- boton para jefe --}}

                <th> ELIMINAR </th>

            </tr>

            @foreach ($juegos as $juego)
                <tr>
                    <td>{{ $juego->nombre }}</td>
                    <td>
                        <p>{{ $juego->plataforma }}</p>
                    </td>
                    <td>
                        <img class="img-responsive" width='200px' src="{{ asset($juego->imagen) }}" />
                    </td>
                    <td>
                        <p>{{ $juego->descripcion }}</p>
                    </td>
                    <td class="text-center"> <a href="/juegos/{{ $juego->id }}"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-info-square"
                                viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg></a></td>


                    {{-- boton para jefe --}}
                    <td class="text-center"> <a href="/juegos/{{ $juego->id }}/borrar"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></a>
                    </td>

                </tr>
            @endforeach
        </table>
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
