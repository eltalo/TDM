@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Partidos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('partido.create') }}" class="btn btn-info" >Nuevo Partido</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
                <th>Jugador1</th>
                <th>Jugador2</th>
                <th>PtosJ1S1</th>
                <th>PtosJ1S2</th>
                <th>Editar</th>
                <th>Eliminar</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($partidos->count())  
              @foreach($partidos as $partido)  
              <tr>
                <td>{{$partido->IDJugador1}}</td>
                <td>{{$partido->IDJugador2}}</td>
                <td>{{$partido->PtosJugador1Set1}}</td>
                <td>{{$partido->PtosJugador1Set2}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('PartidoController@edit', $partido->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('PartidoController@destroy', $partido->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $partidos->links() }}
    </div>
  </div>
</section>

@endsection