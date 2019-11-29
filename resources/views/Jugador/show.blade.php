@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Juegos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('partido.create') }}" class="btn btn-info" >Nuevo Partido</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead class="success">
                <th>Partido</th>
                <th>Jugador</th>
                <th>Set</th>
                <th>Ganador</th>
                <th>Fecha</th>
             <tbody>

                @foreach($infoparidosjugadors as $info)  
                @if ($info->GANADOR=="X")
                <tr class="success">
                    <td>{{$info->idPartido}}</td>
                    <td>{{$info->Jugador}}</td>
                    <td>{{$info->Sets}}</td>
                    <td>{{$info->GANADOR}}</td>
                    <td>{{$info->FechaPartido}}</td>
                </tr>
                @else
                <tr>
                    <td>{{$info->idPartido}}</td>
                    <td>{{$info->Jugador}}</td>
                    <td>{{$info->Sets}}</td>
                    <td>{{$info->GANADOR}}</td>
                    <td>{{$info->FechaPartido}}</td>
                </tr>

                @endif
                @endforeach 
            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection