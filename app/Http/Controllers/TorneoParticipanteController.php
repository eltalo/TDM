<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // para ejecutar SP
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Clase;
use App\InformacionAdicionals;


class TorneoParticipanteController extends Controller
{
    //
    public function index()
    {
        $InfTors = DB::table('torneosparticipantes')
        ->select('id', 'nombreParticipante','clubParticipante','cabezaSerie','activo','grupo')
        ->where('activo','=', '1')
        ->orderBy('nombreParticipante')
        ->paginate(20);
        return view('TorneoParticipante.index',compact('InfTors'));    
    }

    public function create()
    {
        $InfClubs = DB::table('torneosparticipantes')
        ->select('clubParticipante')
        ->distinct()
        ->orderBy('clubParticipante')
        ->get();
        return view('TorneoParticipante.create',compact('InfClubs'));
    }
    public function store(Request $rq)
    {

        if(strlen($rq->input('cmbclubParticipante'))>0)
        {
            $nombreClub=$rq->input('cmbclubParticipante');
        }
        else
        {
            $nombreClub=$rq->input('clubParticipante');
        }
        $InfAs = DB::table('torneosparticipantes')
        ->select('id')
        ->where('nombreParticipante' , '=', $rq->input('nombreParticipante'))
        ->get();
        $InfAsCount = count($InfAs);
        if ($InfAsCount>0)
        {
            $InfClubs = DB::table('torneosparticipantes')
            ->select('clubParticipante')
            ->distinct()
            ->orderBy('clubParticipante')
            ->get();
            return view('TorneoParticipante.create',compact('InfClubs'))->with('status', 'Participante ya existe !!!');
            /*
            return view('TorneoParticipante.create',compact('InfClubs'))->with('successMsg','Participante ya existe !!!');

            $InfTors = DB::table('torneosparticipantes')
            ->select('id', 'nombreParticipante','clubParticipante','cabezaSerie','activo')
            ->where('activo','=', '1')
            ->orderBy('nombreParticipante')
            ->paginate(20);
            return view('TorneoParticipante.index',compact('InfTors'));   
            */ 

        }
        else
        {
            DB::table('torneosparticipantes')->insert([
                [
                'nombreParticipante'    => $rq->input('nombreParticipante'),
                'clubParticipante'      => $nombreClub,
                'cabezaSerie'           => intval($rq->input('cabezaSerie')),
                'activo'                => 1
                ]
            ]);   
            $InfTors = DB::table('torneosparticipantes')
            ->select('id', 'nombreParticipante','clubParticipante','cabezaSerie','activo','grupo')
            ->where('activo','=', '1')
            ->orderBy('nombreParticipante')
            ->paginate(20);
            return view('TorneoParticipante.index',compact('InfTors'));    
        }

    }

    public function show()
    {

        $InfTors = DB::table('torneosparticipantes')
        ->select('nombreParticipante','clubParticipante','grupo')
        ->orderBy('grupo')
        ->paginate(21);
        return view('TorneoParticipante.grupos',compact('InfTors'));
        #select grupo,count(1) from torneosparticipantes group by grupo;
    }

}


