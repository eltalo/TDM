@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Asistencia</h3></div>
          
          <div class="pull-right">
            <div class="btn-group">
            <a href="{{ route('InformacionAdicional.create') }}" class="btn btn-info" >Añadir Informacion</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              <th>Id</th>
              <th>Fecha</th>
              <th>Nombre</th>
              <th>Accion</th>
             </thead>
             <tbody>
              @if($asistencias->count())  
              @foreach($asistencias as $info)  
              <tr>
                <td>{{$info->id}}</td>
                <td>{{date('d-m-Y', strtotime($info->fecha))}}</td>
                <td>{{$info->nombre}}</td>
                <td>
                  <form action="{{action('AsistenciaController@destroy', $info->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
                </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="4">No hay registro !!</td>
              </tr>
              @endif               
            </tbody>
 
          </table>
        </div>
      </div>
      {{ $asistencias->links() }}
    </div>
  </div>
</section>

@endsection
