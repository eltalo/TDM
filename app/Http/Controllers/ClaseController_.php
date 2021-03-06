<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // para ejecutar SP
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Clase;


class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        if (Auth::user()->nivel>1)
        {
            $clases=Clase::orderBy('id')->paginate(10);
        }            
        else
        {
            $clases = DB::table('clases')->whereRaw('Date(Fecha)= CURDATE()')->orderBy('id')->paginate(10);            
        }
        return view('Clase.index',compact('clases')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Clase.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha =$request->input('FechaClase');
        $Leccion =$request->input('Leccion');
        $Tiempo =$request->input('Tiempo');
        $parametros ='"'.$fecha.'","'.$Leccion.'",'.$Tiempo;
        $infos = DB::select('call SP_TDM_CLASE_ADD('.$parametros.');');
        $clases=Clase::orderBy('id')->paginate(10);
        return view('Clase.index',compact('clases')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        clase::find($id)->delete();
        return redirect()->route('clase.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
