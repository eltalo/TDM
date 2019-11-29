<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // para ejecutar SP
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Contabilidad;


class ContabilidadController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idJugador)
    {
        $contas=Contabilidad::find($idJugador);
        return  view('Contabilidad.show',compact('contas'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$contas=contabilidad::orderBy('id','DESC')->paginate(3);
        $contas = contabilidad::query()
        ->join('users', 'contabilidads.idJugador', '=', 'users.id')
        ->select('contabilidads.id', 'contabilidads.FechaMovimiento', 'users.name as nombre','contabilidads.monto' )
        ->orderByRaw('contabilidads.FechaMovimiento DESC ')
        ->paginate(10);
        return view('Contabilidad.index',compact('contas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::orderBy("name")->get();
        return view('Contabilidad.create',compact('usuarios'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #dd($request->all());
        $this->validate($request,[ 'FechaMovimiento'=>'required', 'Monto'=>'required']);
        #contabilidad::create($request->all());
        $parametros =$request->IDJugador.',"'.$request->FechaMovimiento.'",'.$request->Monto;
        #dd($parametros);
        $infops = DB::select('call SP_TDM_CONTABILIDAD_ADD('.$parametros.');');
        
        $contas = contabilidad::query()
        ->join('users', 'contabilidads.idJugador', '=', 'users.id')
        ->select('contabilidads.id', 'contabilidads.FechaMovimiento', 'users.name as nombre','contabilidads.monto' )
        ->orderByRaw('contabilidads.FechaMovimiento DESC ')
        ->paginate(10);
        return view('Contabilidad.index',compact('contas')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contas=contabilidad::find($id);
        return view('Contabilidad.edit',compact('contas'));
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

        $this->validate($request,[ 'IDJugador'=>'required', 'FechaMovimiento'=>'required', 'Monto'=>'required']);
        contabilidad::update($request->all());
        return redirect()->route('Contabilidad.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #contabilidad::find($id)->delete();
        #return redirect()->route('Contabilidad.index')->with('success','Registro eliminado satisfactoriamente');
        $ContabilidadDelete = contabilidad::find($id);
        $ContabilidadDelete->delete();
        
        
        $contas = contabilidad::query()
        ->join('users', 'contabilidads.idJugador', '=', 'users.id')
        ->select('contabilidads.id', 'contabilidads.FechaMovimiento', 'users.name as nombre','contabilidads.monto' )
        ->orderByRaw('contabilidads.FechaMovimiento DESC ')
        ->paginate(10);
        return view('Contabilidad.index',compact('contas')); 
        
        
    }
}
