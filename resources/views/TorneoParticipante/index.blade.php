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
            <a href="{{ route('TorneoParticipante.create') }}" class="btn btn-success" >Añadir Participante</a>
            </div>
          </div>

          
          
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              <th>Nombre</th>
              <th>Club</th>
              <th>CS</th>
              <th>grupo</th>

             </thead>
             <tbody>
              @if($InfTors->count())  
              @foreach($InfTors as $InfTor)  
              <tr>
                <td>{{$InfTor->nombreParticipante}}</td>
                <td>{{$InfTor->clubParticipante}}</td>
                <td>{{$InfTor->cabezaSerie}}</td>
                <td>{{$InfTor->grupo}}</td>                

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
      {{ $InfTors->links() }}      
    </div>
  </div>
</section>

@endsection
