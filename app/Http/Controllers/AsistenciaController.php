<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // para ejecutar SP
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Asistencias;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = asistencias::query()
        ->join('users', 'asistencias.idJugador', '=', 'users.id')
        ->select('asistencias.id', 'asistencias.Fecha as fecha', 'users.name as nombre')
        ->orderByRaw('asistencias.Fecha DESC , users.name')
        ->paginate(10);
        return view('Asistencia.index',compact('asistencias')); 
    }    //
    public function show($id)
    {
        dd($id);
        //$value = $request->members; 
        //dd($request->all());
        $infos1 = DB::table('asistencias')
        ->join('users', 'asistencias.idJugador', '=', 'users.id')
        ->where('asistencias.id','=', $id)
        ->select('asistencias.id', 'asistencias.fecha', 'users.name as nombre')
        ->orderByRaw('Asistencias.fecha DESC , users.name')
        ->get();

        $infos = DB::select('call SP_TDM_ASISTENCIA();');
        return view('Asistencia.index',compact('infos')); 
    }    //
    public function create()
    {
        $usuarios = User::orderBy("name")->get();
        return view('Asistencia.create',compact('usuarios'));
    }
    public function update()
    {
        $usuarios = User::orderBy("name")->get();
        return view('Asistencia.create',compact('usuarios'));
    }
    public function store(Request $request)
    {
        #dd($request->input('FechaAsiste'));
        
        $Asiste = $request->input('alumnoAsiste');
        $array = json_encode($Asiste, true);
        $fecha =$request->input('FechaAsiste');
        $bloque = 1;
        $lista=str_replace('"','',str_replace(']','',str_replace('[','',$array)));
        $parametros ='"'.$lista.'","'.$fecha.'",'.$bloque;
        $infos = DB::select('call SP_TDM_LISTA_ADD('.$parametros.');');
        
        $asistencias = asistencias::query()
        ->join('users', 'asistencias.idJugador', '=', 'users.id')
        ->select('asistencias.id', 'asistencias.Fecha as fecha', 'users.name as nombre')
        ->orderByRaw('asistencias.Fecha DESC , users.name')
        ->paginate(10);
        return view('Asistencia.index',compact('asistencias')); 
        
        #return redirect()->route('Asistencia.index')->with('success','Registro creado satisfactoriamente');
        
    }
    #public function destroy($id)
    #public function destroy(Request $request)
    public function destroy($id)
    {
        
        #$AsistenciaDelete = asistencias::find($id);

        #dd($id);
        #asistencias::find($id)->delete();
        
        $AsistenciaDelete = asistencias::find($id);
        $AsistenciaDelete->delete();
        
        #Asistencia::find($id)->delete();
        #$infos1 = DB::select('call SP_TDM_LISTA_DELETE('.$request->IdBorar.');');
#        $infos1 = DB::select('call SP_TDM_LISTA_DELETE('.$id.');');
        #$infos = DB::select('call SP_TDM_ASISTENCIA();');
        #return view('asistencia.index',compact('infos')); 
        $asistencias = asistencias::query()
        ->join('users', 'asistencias.idJugador', '=', 'users.id')
        ->select('asistencias.id', 'asistencias.Fecha as fecha', 'users.name as nombre')
        ->orderByRaw('asistencias.Fecha DESC , users.name')
        ->paginate(10);
        return view('Asistencia.index',compact('asistencias')); 

    }    

}
