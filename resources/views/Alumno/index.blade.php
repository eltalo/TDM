@extends('layouts.app')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Informacion Adicional</h3>
				</div>
        <div class="table-container">
          <table id="mytable" class="table table-bordred table-striped">
           <thead>
             <th>Nombre</th>
             <th>Fecha Nacimiento</th>
             <th>Contacto1</th>
             <th>Parentesto1</th>
             <th>Telefono1</th>
             <th>Contacto2</th>
             <th>Parentesto2</th>
             <th>Telefono2</th>
             <th>Enfermedades</th>
           </thead>
           <tbody>
            @if($InfAs->count())  
            @foreach($InfAs as $InfoAdd)  
            <tr>
              <td>{{$InfoAdd->NombreAlumno}}</td>
              <td>{{substr($InfoAdd->FechaNacimiento,8,2)}}-{{substr($InfoAdd->FechaNacimiento,5,2)}}-{{substr($InfoAdd->FechaNacimiento,0,4)}}</td>
              <td>{{$InfoAdd->Contacto1Parentesco}}</td>
              <td>{{$InfoAdd->Contacto1Nombre}} {{$InfoAdd->Contacto1Apellido}}</td>
              <td>{{$InfoAdd->Contacto1Telefono}}</td>

              <td>{{$InfoAdd->Contacto2Parentesco}}</td>
              <td>{{$InfoAdd->Contacto2Nombre}} {{$InfoAdd->Contacto2Apellido}}</td>
              <td>{{$InfoAdd->Contacto2Telefono}}</td>
              <td>{{$InfoAdd->Enfermedades}}</td>
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
		</div>
</section>
@endsection
  