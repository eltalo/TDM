<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; //para llamar a procedimientos
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\Partido;
use App\User;


class JugadorController extends Controller
{
    public function index()
    {
        $fechas = DB::select('call SP_TDM_LISTA_FECHA_PARTIDO();');
        //return view('Jugador.index',compact('fechas')); 
        $infos = DB::select('call SP_TDM_INFO_JUGADOR();');
        return view('Jugador.index',compact('infos','fechas')); 
        //return view('Jugador.index',compact('infos')); 
    }
    public function show($id)
    {
        $infoparidosjugadors = DB::select('call SP_TDM_INFO_PARTIDO_JUGADOR('.$id.');');
        return  view('Jugador.show',compact('infoparidosjugadors'));
        //$Partidos=Partido::find($id);
        //return  view('Partido.show',compact('Partidos'));
    }
    public function infopartido()
    {
    //
    }
}
