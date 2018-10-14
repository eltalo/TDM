@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Jugadores</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('partido.create') }}" class="btn btn-info" >Nuevo Partido</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
                <th>Partido</th>
                <th>Jugador</th>
                <th>Set1</th>
                <th>Set2</th>
                <th>Set3</th>
                <th>Set4</th>
                <th>Set5</th>
                <th>Ganador</th>
                <th>Fecha</th>
             <tbody>
                @foreach($infoparidosjugadors as $info)  
                <tr>
                    <td>{{$info->idPartido}}</td>
                    <td>{{$info->Jugador}}</td>
                    <td>{{$info->SET1}}</td>
                    <td>{{$info->SET2}}</td>
                    <td>{{$info->SET3}}</td>
                    <td>{{$info->SET4}}</td>
                    <td>{{$info->SET5}}</td>
                    <td>{{$info->GANADOR}}</td>
                    <td>{{$info->FechaPartido}}</td>
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