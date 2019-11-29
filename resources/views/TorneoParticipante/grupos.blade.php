@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Grupos</h3></div>
          
         
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              <th>Grupo</th>
              <th>Nombre</th>
              <th>Club</th>

             </thead>
             <tbody>
              @if($InfTors->count())  
              @foreach($InfTors as $InfTor)  
              <tr>
                <td>{{$InfTor->grupo}}</td>    
                <td>{{$InfTor->nombreParticipante}}</td>
                <td>{{$InfTor->clubParticipante}}</td>
               </tr>
               @endforeach 
               
               @else
               <tr>
                <td colspan="3">No hay registro !!</td>
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
