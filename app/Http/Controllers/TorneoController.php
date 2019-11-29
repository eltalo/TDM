<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // para ejecutar SP
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Clase;
use App\InformacionAdicionals;

class TorneoController extends Controller
{
    //
    public function index()
    {
        $InfTors = DB::table('torneos')
        ->select('id', 'nombreTorneo','fechaTorneo')
        ->where('activo','=', '1')
        ->get();
        return view('Torneo.index',compact('InfTors'));    
    }

    public function create()
    {
        $InfTors = DB::table('torneos')
        ->select('id', 'nombreTorneo','fechaTorneo')
        ->where('activo','=', '1')
        ->get();
        return view('Torneo.create',compact('InfTors'));  
    }
    public function store(Request $rq)
    {
        //$date = DateTime::createFromFormat('d-m-Y H:i:s', Input::get('plannedTime'));
        //$usableDate = $date->format('Y-m-d H:i:s');        
        //$date = $rq->input('FechaNacimiento');
        //$usableDate = $date->format('Y-m-d H:i:s');     
        $usableDate = $rq->input('fechaTorneo');
        $date = Carbon::parse($rq->input('fechaTorneo'));
        $dateOK= $date->format('Y-m-d');

        $InfAs = DB::table('torneos')
        ->select('id')
        ->where('nombreTorneo' , '=', $rq->input('fechaTorneo'))
        ->get();
        $InfAsCount = count($InfAs);
        if ($InfAsCount>0)
        {
            $InfTors = DB::table('torneos')
            ->select('id', 'nombreTorneo','fechaTorneo')
            ->where('activo','=', '1')
            ->get();
            return view('Torneo.index',compact('InfTors'));

        }
        else
        {
            DB::table('torneos')->insert([
                [
                'nombreTorneo'       => $rq->input('nombreTorneo'),
                'fechaTorneo'        => $dateOK,
                'activo'             => 1
                ]
            ]);   
            $InfTors = DB::table('torneos')
            ->select('id', 'nombreTorneo','fechaTorneo')
            ->where('activo','=', '1')
            ->get();
            return view('Torneo.index',compact('InfTors'));
        }

    }
}
