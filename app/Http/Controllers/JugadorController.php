<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\Partido;
use App\User;


class JugadorController extends Controller
{
    //public function index()
    public function index(Request $request)
    {
        //$value = $request->members; 
        //dd($request->all());
        
        $FechaP = $request->FechaPartido;
        if ($FechaP === null)
        {
            $fechas = DB::select('call SP_TDM_LISTA_FECHA_PARTIDO();');
            $infos = DB::select('call SP_TDM_INFO_JUGADOR_SET();');
            return view('Jugador.index',compact('infos','fechas')); 
        }
        else
        {
            $fechas = DB::select('call SP_TDM_LISTA_FECHA_PARTIDO();');
            $infos = DB::select('call SP_TDM_INFO_JUGADOR();');
            return view('Jugador.index',compact('infos','fechas')); 
        }
        //dd($request);
        
        //$IDJ1 = $request->IDJugador1;
        
        //return view('Jugador.index',compact('fechas')); 
        //return view('Jugador.index',compact('infos')); 
    }
    public function show($id)
    {
        $infoparidosjugadors = DB::select('call SP_TDM_INFO_PARTIDO_SET_JUGADOR('.$id.');');
        return  view('Jugador.show',compact('infoparidosjugadors'));
        //$Partidos=Partido::find($id);
        //return  view('Partido.show',compact('Partidos'));
    }

    public function infopartido(Request $request)
    {
        //$FechaP = $request->FechaPartido;
        
        dd($request);
        $infoparidosjugadors = DB::select('call SP_TDM_INFO_PARTIDO_FECHA('.$FechaP.');');

        //return view('Jugador.index',compact('infos','infoparidosjugadors')); 
        //return view('Jugador.index',compact('infos')); 
    }

}
