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
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('userinformation.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">

									<div class="form-group">
									Fecha Nacimiento
									<input type="text" class="form-control input-sm" name="FechaNacimiento" id="FechaNacimiento" value="{{date("d-m-Y")}}">
									</div>
									<div class="form-group">
										Telefono Contacto1
										<input type="text" class="form-control input-sm" name="Contacto1Telefono" id="Contacto1Telefono" value="+56">
									</div>
									<div class="form-group">
										Nombres Contacto1
										<input type="text" class="form-control input-sm" name="Contacto1Nombre" id="Contacto1Nombre" >
									</div>
									<div class="form-group">
										Apellidos Contacto1
										<input type="text" class="form-control input-sm" name="Contacto1Apellido" id="Contacto1Apellido" >
									</div>
									<div class="form-group">
										Parestensco
										<select name="Parestensco1" id="Parestensco1" class="form-control">
											<option value="Madre/Padre">Madre/Padre</option>
											<option value="Esposo(a)/Pareja">Esposo(a)/Pareja</option>
											<option value="Hijo(a)">Hijo(a)</option>
											<option value="Otro">Otro</option>
										</select>
									</div>
									<div class="form-group">
											Telefono Contacto 2
											<input type="text" class="form-control input-sm" name="Contacto2Telefono" id="Contacto2Telefono" value="+56">
										</div>
										<div class="form-group">
											Nombres Contacto 2
											<input type="text" class="form-control input-sm" name="Contacto2Nombre" id="Contacto2Nombre" >
										</div>
										<div class="form-group">
											Apellidos Contacto 2
											<input type="text" class="form-control input-sm" name="Contacto2Apellido" id="Contacto2Apellido" >
										</div>
										<div class="form-group">
											Parestensco
											<select name="Parestensco1" id="Parestensco1" class="form-control">
												<option value="Madre/Padre">Madre/Padre</option>
												<option value="Esposo(a)/Pareja">Esposo(a)/Pareja</option>
												<option value="Hijo(a)">Hijo(a)</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
										<div class="form-group">
										Informacion / Enefermedad / Alergia
										<textarea rows="4", cols="20" class="form-control input-sm" id="Enfermedades" name="Enfermedades" style="resize:none, "></textarea>
									</div>										
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success">
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection