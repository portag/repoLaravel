<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class juegosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.juegos', ['juegos' => Juego::all()], ['torneos' => Torneo::all()]);
            } else {
                return view('web.juegos', ['juegos' => Juego::all()], ['torneos' => Torneo::all()]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('web.juegos', ['juegos' => Juego::all()], ['torneos' => Torneo::all()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nuevoJuego');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $juego = new Juego();
        $juego->nombre = $request->input('nombre');
        $juego->plataforma = $request->input('plataforma');
        $juego->descripcion = $request->input('descripcion');
        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $juego->imagen =  str_replace('public', 'storage', $path);

        $juego->save();

        return redirect('/juegos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Juego $juego, Torneo $torneo)
    {

        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.juegoView', ['juego' => $juego, 'torneos' => $torneo::all()]);
            } else {
                return view('web.juegoView', ['juego' => $juego, 'torneos' => $torneo::all()]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('web.juegoView', ['juego' => $juego, 'torneos' => $torneo::all()]);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juego $juego)
    {
        $juego->delete();
        return redirect('juegos');
    }
}
