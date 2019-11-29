@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Clase</h3></div>
          <div class="pull-right">
            @if (Auth::user()->nivel>1)
            <div class="btn-group">
              <a href="{{ route('clase.create') }}" class="btn btn-info" >Añadir Item</a>
            </div>
            @endif
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              @if (Auth::user()->nivel>1)
                <th>ID</th>
                <th>Fecha</th>
                <th>Item</th>
                <th>Duracion</th>
                <th>Local</th>
                <th>Eliminar</th>
              @else
                <th>Fecha</th>
                <th>Item</th>
                <th>Duracion</th>
              @endif                                

             </thead>
             <tbody>
              @if($clases->count())  
              @foreach($clases as $clase)  
              <tr>
                @if (Auth::user()->nivel>1)
                  <td>{{$clase->id}}</td>
                  <td>{{date('d-m-Y', strtotime($clase->Fecha))}}</td>
                  <td>{{$clase->leccion}}</td>
                  <td>{{$clase->tiempo}}</td>
                  <td>{{$clase->local}}</td>
                  <td>
                    <form action="{{action('ClaseController@destroy', $clase->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </td>
                  @else
                    <td>{{date('d-m-Y', strtotime($clase->Fecha))}}</td>
                    <td>{{$clase->leccion}}</td>
                    <td>{{$clase->tiempo}}</td>
                  @endif                                
                </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="5">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      {{ $clases->links() }}
    </div>
  </div>
</section>
 
@endsection