<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\TorneoResource;
use App\Http\Resources\EquipoResource;
use App\Http\Resources\UserResource;
use App\Models\Juego;
use App\Models\Equipo;
use App\Models\Torneo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//////////////////////////////////////////////////


Route::middleware('auth:sanctum')->group(function () {
   

    //todos los torneos
    Route::get('torneos/', function () {
       
        return new TorneoResource(Torneo::all());
    });
    

    //torneos activos
    Route::get('torneos/activo',  function () {
        return TorneoResource::collection(Torneo::where('estado','activo')->get());
    });
    
    //buscar torneo por id
    Route::get('torneos/{id}',  function ($id) {
        return new TorneoResource(Torneo::findOrFail($id));
    });

    //mostrar los jugadores de equipos en ese torneo
    Route::get('torneos/{id}/equipos',  function ($id) {
        $torneo = Torneo::findOrFail($id);
        $equipos = $torneo->equipos()->get();
        foreach($equipos as $equipo){
            $jugadores = $equipo->componentes()->get();
        }
        return new TorneoResource(['torneo' => $torneo,'equipo' => $equipos,'jugadores'=>$jugadores]);
    });


    //mostrar equipo y jugadores segun modalidad
    Route::get('equipos/1',  function () {
        $equipos = Equipo::where('modalidad',1)->get();
        foreach($equipos as $equipo){
            $jugadores = $equipo->componentes()->get();
        }        
        return new EquipoResource(['equipos' => $equipos, 'jugadores'=>$jugadores]);
    });

    Route::get('equipos/2',  function () {
        $equipos = Equipo::where('modalidad',2)->get();
        foreach($equipos as $equipo){
            $jugadores = $equipo->componentes()->get();
        }        
        return new EquipoResource(['equipos' => $equipos, 'jugadores'=>$jugadores]);
    });

    Route::get('equipos/3',  function () {
        $equipos = Equipo::where('modalidad',3)->get();
        foreach($equipos as $equipo){
            $jugadores = $equipo->componentes()->get();
        }        
        return new EquipoResource(['equipos' => $equipos, 'jugadores'=>$jugadores]);
    });

    Route::get('equipos/4',  function () {
        $equipos = Equipo::where('modalidad',4)->get();
        foreach($equipos as $equipo){
            $jugadores = $equipo->componentes()->get();
        }        
        return new EquipoResource(['equipos' => $equipos, 'jugadores'=>$jugadores]);
    });

    Route::get('equipos/5',  function () {
        $equipos = Equipo::where('modalidad',5)->get();
        foreach($equipos as $equipo){
            $jugadores = $equipo->componentes()->get();
        }        
        return new EquipoResource(['equipos' => $equipos, 'jugadores'=>$jugadores]);
    });



    Route::get('equipos/abierto',  function () {

        $equipos = Equipo::where('estado','Abierto')->get();

        foreach($equipos as $equipo){
            $jugadores = $equipo->componentes()->get();
        }        

        return new EquipoResource(['equipos' => $equipos, 'jugadores'=>$jugadores]);
    });


    Route::get('jugadores',  function () {
        return new UserResource(User::all());
    });

    Route::get('jugadores/nivel/{nivel}',  function ($nivel) {
        return new UserResource(User::where('nivel',$nivel)->get());
    });


    Route::post('torneos/{id}/registrar',  function (Request $request, $id) {
        $torneo = Torneo::find($id);
        $equipo_id = $request->equipo;
        $torneo->equipos()->attach($equipo_id);
        return response()->json(['msg:' => 'Equipo agregado']);
    });

    

});


//CREAR TOKEN
Route::post('/tokens/create', function (Request $request) {
  
    $user = User::where('email', $request->email)->first();
  
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Usuario o clave incorrectos']);
        /*
        throw ValidationException::withMessages([
          'email' => ['The provided credentials are incorrect.'],
        ]);
        */
    }

    $token = $user->createToken($request->email);
 
    return response()->json(['token' => $token->plainTextToken]);
});