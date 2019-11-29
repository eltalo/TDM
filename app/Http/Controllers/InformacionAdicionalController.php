<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // para ejecutar SP
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Clase;
use App\InformacionAdicionals;

class InformacionAdicionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InfoAdds = DB::table('informacionadicionals')
        ->select('id', 'Item','Tipo','Orden')
        ->orderByRaw('Orden')
        ->get();
        return view('InformacionAdicional.index',compact('InfoAdds'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $InfoAdds = DB::table('informacionadicionals')
        ->select('id', 'Item','Tipo','Orden')
        ->orderByRaw('Orden')
        ->get();
        return view('InformacionAdicional.create',compact('InfoAdds'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $Item = $request->input('Item');
        $Orden = $request->input('Orden');
        $Tipo = $request->input('Tipo');
        DB::table('informacionadicionals')->insert([
            [
                'Item' => $Item,
                'Orden' => $Orden,
                'Tipo' =>  $Tipo 
            ]
        ]);
        $InfoAdds = DB::table('informacionadicionals')
        ->select('id', 'Item','Tipo','Orden')
        ->orderByRaw('Orden')
        ->get();
        return view('InformacionAdicional.index',compact('InfoAdds'));          
        
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
        DB::table('informacionadicionals')->where('id', '=', $id)->delete();
        $InfoAdds = DB::table('informacionadicionals')
        ->select('id', 'Item','Tipo','Orden')
        ->orderByRaw('Orden')
        ->get();
        return view('InformacionAdicional.index',compact('InfoAdds'));    
        //
    }
}
