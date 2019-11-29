<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // para ejecutar SP
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Clase;
use App\InformacionAdicionals;



class AsignaGrupoController extends Controller
{
    //
    public function create()
    {

        if(Auth::user()->nivel>10)
        {
            $lista = DB::select('call SP_GENERA_GRUPOS();');
        }
        
        $InfTors = DB::table('torneosparticipantes')
        ->select('nombreParticipante','clubParticipante','grupo')
        ->orderBy('grupo')
        ->paginate(21);
        return view('TorneoParticipante.grupos',compact('InfTors'));
        #select grupo,count(1) from torneosparticipantes group by grupo;
    }
}
