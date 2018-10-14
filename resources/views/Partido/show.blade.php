@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Info Partido</h3></div>
          <div class="pull-right">
<!--            <div class="btn-group">
              <a href="{{ route('partido.create') }}" class="btn btn-info" >Nuevo Partido</a>
            </div>
        -->
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
                <th>Partdo</th>
                <th>Jugador</th>
                <th>Set1</th>
                <th>Set2</th>
                <th>Set3</th>
                <th>Set4</th>
                <th>Set5</th>
                <th>Ganador</th>
                <th>Fecha</th> 
                <th>Accion</th> 
             <tbody>
                @foreach($infops as $par)  
                <tr>
                    <td>{{$par->idPartido}}</td>
                    <td>{{$par->Jugador}}</td>
                    <td>{{$par->SET1}}</td>
                    <td>{{$par->SET2}}</td>
                    <td>{{$par->SET3}}</td>
                    <td>{{$par->SET4}}</td>
                    <td>{{$par->SET5}}</td>
                    <td>{{$par->GANADOR}}</td>                    
                    <td>{{$par->FechaPartido}}</td>          
                    <td>{{$par->idJugador}}</td>
                 </tr>
                 @endforeach 
            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection