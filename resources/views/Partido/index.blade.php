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
                <th>Id</th>
                <th>Jugador</th>
                <th>Partidos Jugados</th>
                <th>Partidos Ganados</th>
                <th>Rendimiento</th>
             <tbody>
                @foreach($infos as $info)  
                <tr>
                  <!--
                    <td><a class="btn btn-primary btn-xs" href="{{action('PartidoController@edit', $info->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                  -->
                    <td>{{$info->id}}</td>
                    <td>{{$info->NOMBRE}}</td>
                    <td>{{$info->JUGADOS}}</td>
                    <td>{{$info->GANADOS}}</td>
                    <td>{{$info->Rendimiento}}</td>
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