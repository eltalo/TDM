@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Contabilidad</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('contabilidad.create') }}" class="btn btn-info" >Añadir Pago</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID</th>
               <th>Fecha</th>
               <th>Nombre</th>
               <th>Monto</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($contas->count())  
              @foreach($contas as $conta)  
              <tr>
                <td>{{$conta->id}}</td>
                <td>{{$conta->FechaMovimiento}}</td>
                <td>{{$conta->nombre}}</td>
                <td>{{$conta->monto}}</td>
                <td>
                  <form action="{{action('ContabilidadController@destroy', $conta->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
                 </td>
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
      {{ $contas->links() }}
    </div>
  </div>
</section>
 
@endsection