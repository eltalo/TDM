@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Ranking Jugadores</h3>
<!--
          <select name="FechaPartido" id="FechaPartido" class="form-control">
              <label for="">Fecha</label>
              {{$num=0}}
              @foreach($fechas as $fecha)
                <option value="{{$num}}">{{$fecha->FechaPartido}}</option>
                {{$num++}}
              @endforeach
          </select>	
        -->      
          </div>
          {{ csrf_field() }}

            <table id="mytable" class="table table-bordred table-striped">
             <thead>
                <th>Id</th>
                <th>Jugador</th>
                <th>Jugados</th>
                <th>Ganados</th>
                <th>Rendimiento</th>
             <tbody>
                @foreach($infos as $info)  
                    @if ((Auth::user()->id) == $info->id)
                    <tr>                
                      <td bgcolor="lime">{{$info->id}}</td>
                      <td bgcolor="lime">{{$info->NOMBRE}}</td>
                      <td bgcolor="lime">{{$info->JUGADOS}}</td>
                      <td bgcolor="lime">{{$info->GANADOS}}</td>
                      <td bgcolor="lime">{{$info->Rendimiento}}</td>
                    </tr>                       
                    @else
                    <tr>
                      <td>{{$info->id}}</td>
                      <td>{{$info->NOMBRE}}</td>
                      <td>{{$info->JUGADOS}}</td>
                      <td>{{$info->GANADOS}}</td>
                      <td>{{$info->Rendimiento}}</td>
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