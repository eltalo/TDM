@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Torneos</h3></div>
          
          <div class="pull-right">
            <div class="btn-group">
            <a href="{{ route('Torneo.create') }}" class="btn btn-info" >Añadir Torneo</a>
            </div>
          </div>
          
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              <th>Id</th>
              <th>Nombre</th>
              <th>Fecha</th>              
              <th>Accion</th>
             </thead>
             <tbody>
              @if($InfTors->count())  
              @foreach($InfTors as $InfTor)  
              <tr>
                <td>{{$InfTor->id}}</td>
                <td>{{$InfTor->nombreTorneo}}</td>
                <td>{{$InfTor->fechaTorneo}}</td>
                <td>
                  <form action="{{action('TorneoController@destroy', $InfTor->id)}}" method="post">
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
      
    </div>


  </div>
</section>

@endsection
