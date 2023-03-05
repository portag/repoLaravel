<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class equiposController extends Controller
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
                return view('admin.equipos', ['equipos' => Equipo::paginate(10)]);
            } else {
                return view('web.equipos', ['equipos' => Equipo::paginate(10)]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('web.equipos', ['equipos' => Equipo::paginate(10)]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.nuevoEquipo');
            } else {
                return view('web.nuevoEquipo');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipo = new Equipo();
        $equipo->nombre = $request->input('nombre');
        $equipo->modalidad = $request->input('modalidad');
        $equipo->estado = $request->input('estado');
        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $equipo->imagen =  str_replace('public', 'storage', $path);

        $equipo->save();

        return redirect('/equipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
            
    
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.equipoView', ['equipo' => $equipo, 'jugadores' => $equipo->componentes()->orderBy('nick', 'asc')->get()]);
            } else {
                return view('web.equipoView', ['equipo' => $equipo, 'jugadores' => $equipo->componentes()->orderBy('nick', 'asc')->get()]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('web.equipoView', ['equipo' => $equipo, 'jugadores' => $equipo->componentes()->orderBy('nick', 'asc')->get()]);
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
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect('/equipos');
    }

    public function inscribir(Equipo $equipo, User $user)
    {
        if ($equipo->componentes()->where('user_id', $user->id)->get()->count() == 0) {
            $equipo->componentes()->attach($user->id, ['created_at' => Carbon::now()]);
        }

        return redirect('equipos/'.$equipo->id);
    }

    public function desinscribir(Equipo $equipo, User $user)
    {
        if ($equipo->componentes()->where('user_id', $user->id)->get()->count() == 1) {
            $equipo->componentes()->detach($user->id);
        }

        return redirect('equipos/'.$equipo->id);
    }
}
