@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Informacion Adicional</h3></div>
          
          <div class="pull-right">
            <div class="btn-group">
            <a href="{{ route('informacionadicional.create') }}" class="btn btn-info" >Añadir Informacion</a>
            </div>
          </div>
          
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              <th>Id</th>
              <th>Item</th>
              <th>Tipo</th>              
              <th>Orden</th>              
              <th>Accion</th>
             </thead>
             <tbody>
              @if($InfoAdds->count())  
              @foreach($InfoAdds as $InfoAdd)  
              <tr>
                <td>{{$InfoAdd->id}}</td>
                <td>{{$InfoAdd->Item}}</td>
                <td>{{$InfoAdd->Tipo}}</td>
                <td>{{$InfoAdd->Orden}}</td>                
                <td>
                  <form action="{{action('InformacionAdicionalController@destroy', $InfoAdd->id)}}" method="post">
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
