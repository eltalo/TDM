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
					<h3 class="panel-title">Nuevo Participante</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('TorneoParticipante.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">

							
								<div class="col-xs-6 col-sm-6 col-md-6">
								@if(Session::has('status'))
            					  <div class="alert alert-success"> {{ Session::get('status') }}</div>
        						@endif
                                    <div class="form-group">
										Nombre
										<input type="text" class="form-control input-sm" name="nombreParticipante" id="nombreParticipante" value="">
									</div>
									<div class="form-group">
										<label for="">Club</label>
										<select name="cmbclubParticipante" id="cmbclubParticipante" class="form-control">
												<option value=""></option>
											@foreach($InfClubs as $InfClub)
												<option value="{{$InfClub->clubParticipante}}">{{$InfClub->clubParticipante}}</option>
											@endforeach
										</select>
									</div>

                                    <div class="form-group">
										Club
										<input type="text" class="form-control input-sm" name="clubParticipante" id="clubParticipante" value="">
									</div>

									<div class="form-group">
										<label for="">CS</label>
										<select name="cabezaSerie" id="cabezaSerie" class="form-control">
											<option value=""></option>
											<option value="1">1</option>
										</select>
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