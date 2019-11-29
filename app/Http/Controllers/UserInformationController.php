<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // para ejecutar SP
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Clase;
use App\userInformations;
use Carbon\Carbon;


class UserInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InfAs = DB::table('userInformations')
        ->select(
            'id',
            'FechaNacimiento',
            'Contacto1Telefono',
            'Contacto1Nombre',
            'Contacto1Apellido',
            'Contacto1Parentesco',
            'Contacto2Telefono',
            'Contacto2Nombre',
            'Contacto2Apellido',
            'Contacto2Parentesco',
            'Enfermedades')
        ->where('idUsuario' , [Auth::user()->id])
        ->get();
        $InfAsCount = count($InfAs);
        if ($InfAsCount>0)
        {
            return view('UserInformation.index',compact('InfAs'));                
        }
        else
        {
            return view('UserInformation.create',compact('InfAs'));    
        }

       /*

        $InfAs = DB::select('select 
        id,
        DATE_FORMAT(FechaNacimiento, "%d-%m-%Y") as FechaNacimientoNew,
        Contacto1Telefono,
        Contacto1Nombre,
        Contacto1Apellido,
        Contacto1Parentesco,
        Contacto2Telefono,
        Contacto2Nombre,
        Contacto2Apellido,
        Contacto2Parentesco,
        Enfermedades
        from userInformations where idUsuario =?',[Auth::user()->id] );
        return view('UserInformation.index',compact('InfAs'));    
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $InfoAdds = User::orderBy("name")->get();
        return view('UserInformation.create',compact('InfAs'));
/*
        $InfoAdds = DB::table('userInformations')
        ->select(
            'FechaNacimiento',
            'Contacto1Telefono',
            'Contacto1Nombre',
            'Contacto1Apellido',
            'Contacto1Parentesco',
            'Contacto2Telefono',
            'Contacto2Nombre',
            'Contacto2Apellido',
            'Contacto2Parentesco',
            'Enfermedades')
        ->get();
        */
        //return view('UserInformation.create',compact('InfAs'));    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    }
    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y');
    }

    public function store(Request $rq)
    {
        //$date = DateTime::createFromFormat('d-m-Y H:i:s', Input::get('plannedTime'));
        //$usableDate = $date->format('Y-m-d H:i:s');        
        //$date = $rq->input('FechaNacimiento');
        //$usableDate = $date->format('Y-m-d H:i:s');     
        $usableDate = $rq->input('FechaNacimiento');
        $date = Carbon::parse($rq->input('FechaNacimiento'));
        $dateOK= $date->format('Y-m-d');

        $InfAs = DB::table('userInformations')
        ->select('id','idUsuario')
        ->where('idUsuario' , [Auth::user()->id])
        ->get();
        $InfAsCount = count($InfAs);
        if ($InfAsCount>0)
        {
            DB::table('userInformations')
            ->where('idUsuario' , [Auth::user()->id])
            ->update([
                'FechaNacimiento'    => $dateOK,
                'Contacto1Telefono'  => $rq->input('Contacto1Telefono'),
                'Contacto1Nombre'    => $rq->input('Contacto1Nombre'),
                'Contacto1Apellido'  => $rq->input('Contacto1Apellido'),
                'Contacto1Parentesco'=> $rq->input('Contacto1Parentesco'),
                'Contacto2Telefono'  => $rq->input('Contacto2Telefono'),
                'Contacto2Nombre'    => $rq->input('Contacto2Nombre'),
                'Contacto2Apellido'  => $rq->input('Contacto2Apellido'),
                'Contacto2Parentesco'=> $rq->input('Contacto2Parentesco'),
                'Enfermedades'		 => $rq->input('Enfermedades')            
            ]);
            //return view('UserInformation.index',compact('InfAs'));                
        }
        else
        {
            DB::table('userInformations')->insert([
                [
                'idUsuario'          => Auth::user()->id,
                'FechaNacimiento'    => $dateOK,
                'Contacto1Telefono'  => $rq->input('Contacto1Telefono'),
                'Contacto1Nombre'    => $rq->input('Contacto1Nombre'),
                'Contacto1Apellido'  => $rq->input('Contacto1Apellido'),
                'Contacto1Parentesco'=> $rq->input('Contacto1Parentesco'),
                'Contacto2Telefono'  => $rq->input('Contacto2Telefono'),
                'Contacto2Nombre'    => $rq->input('Contacto2Nombre'),
                'Contacto2Apellido'  => $rq->input('Contacto2Apellido'),
                'Contacto2Parentesco'=> $rq->input('Contacto2Parentesco'),
                'Enfermedades'		 => $rq->input('Enfermedades')            
                ]
            ]);   
            //return view('UserInformation.create',compact('InfAs'));    
        }

        $InfAs = DB::table('userInformations')
        ->select(
            'id',
            'FechaNacimiento',
            'Contacto1Telefono',
            'Contacto1Nombre',
            'Contacto1Apellido',
            'Contacto1Parentesco',
            'Contacto2Telefono',
            'Contacto2Nombre',
            'Contacto2Apellido',
            'Contacto2Parentesco',
            'Enfermedades')
        ->where('idUsuario' , [Auth::user()->id])
        ->get();
        return view('UserInformation.index',compact('InfAs'));                
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
        //
    }

    

}
