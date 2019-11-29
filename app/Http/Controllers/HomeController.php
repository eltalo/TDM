<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // para ver la informacion del usuario
use App\User;
use App\Clase;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->nivel>1)
        {
            $clases=Clase::orderBy('Fecha', 'desc' ,'id' )->paginate(10);
        }            
        else
        {
            $clases = DB::table('clases')->whereRaw('Date(Fecha)= CURDATE()')->orderBy('id')->paginate(10);            
        }
        return view('Clase.index',compact('clases')); 
        //return view('home');
        //$infos = DB::select('call SP_TDM_INFO_JUGADOR();');
        //return view('Partido.index',compact('infos')); 

    }
}
