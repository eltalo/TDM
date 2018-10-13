<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\Partido;
use App\User;

class PartidoController extends Controller
{
    public function __invoke(Request $request)
    {
    }
    public function index()
    {
        //
        $infos = DB::select('call SP_TDM_INFO_JUGADOR();');
        return view('Partido.index',compact('infos')); 
        

        //$partidos=Partido::orderBy('id','DESC')->paginate(10);
        //return view('Partido.index',compact('partidos')); 
        
    }

    public function create()
    {
        $usuarios = User::orderBy("name")->get();
        return view('Partido.create',compact('usuarios'));
    }
    public function store(Request $request)
    {
        //
        //$this->validate($request,[ 'IDJugador1'=>'required', 'IDJugador2'=>'required']);
        //Partido::create($request->all());
        $idUsuaio = Auth::user()->id; // usuario que esta logueado
        $IDJ1 = $request->IDJugador1;
        $IDJ2 = $request->IDJugador2;
        $J1S1 = $request->PtosJugador1Set1;
        $J1S2 = $request->PtosJugador1Set2;
        $J1S3 = $request->PtosJugador1Set3;
        $J1S4 = $request->PtosJugador1Set4;
        $J1S5 = $request->PtosJugador1Set5;
        $J2S1 = $request->PtosJugador2Set1;
        $J2S2 = $request->PtosJugador2Set2;
        $J2S3 = $request->PtosJugador2Set3;
        $J2S4 = $request->PtosJugador2Set4;
        $J2S5 = $request->PtosJugador2Set5;

        if ($J1S1===null) {$J1S1 = 0;}
        if ($J1S2===null) {$J1S2 = 0;}
        if ($J1S3===null) {$J1S3 = 0;}
        if ($J1S4===null) {$J1S4 = 0;}
        if ($J1S5===null) {$J1S5 = 0;}
        if ($J2S1===null) {$J2S1 = 0;}
        if ($J2S2===null) {$J2S2 = 0;}
        if ($J2S3===null) {$J2S3 = 0;}
        if ($J2S4===null) {$J2S4 = 0;}
        if ($J2S5===null) {$J2S5 = 0;}
        $valores=$IDJ1.','.$IDJ2.','.$J1S1.','.$J1S2.','.$J1S3.','.$J1S4.','.$J1S5.','.$J2S1.','.$J2S2.','.$J2S3.','.$J2S4.','.$J2S5.','.$idUsuaio;
        $retorno = DB::select('call sp_TDM_partido_add('.$valores.');');
        //$retorno = DB::select('call sp_TDM_partido_add('.$IDJ1.','.$IDJ2.','.$J1S1.','.$J1S2.','.$J1S3.','.$J1S4.','.$J1S5.','.$J2S1.','.$J2S2.','.$J2S2.','.$J2S4.','.$J2S5.');');
        return redirect()->route('partido.index')->with('success','Registro creado satisfactoriamente');
    }
    public function show($id)
    {
        $Partidos=Libro::find($id);
        return  view('partido.show',compact('Partidos'));
    }
    public function edit($id)
    {
        $partido=partido::find($id);
        return view('partido.edit',compact('partido'));
    }
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 'IDJugador1'=>'required', 'IDJugador2'=>'required']);
        partido::find($id)->update($request->all());
        return redirect()->route('partido.index')->with('success','Registro actualizado satisfactoriamente');
    }
    public function destroy($id)
    {
        Partido::find($id)->delete();
        return redirect()->route('partido.index')->with('success','Registro eliminado satisfactoriamente');
    }    
}
