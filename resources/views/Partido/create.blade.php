<script language="javascript">
function fc_acepta_partido()
{
	var indice = document.form1.IDJugador1.selectedIndex;
	alert(document.form1.IDJugador1.options[indice].text);	
}
</script>	

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
					<h3 class="panel-title">Nuevo Partido</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" name="form1" action="{{ route('partido.store') }}"  role="form">
							{{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Jugador1</label>
                                <select name="IDJugador1" id="IDJugador1" class="form-control">
                                    @foreach($usuarios as $usuario)
                                        @if(Auth::user()->id==$usuario['id'])
                                            <option value="{{$usuario['id']}}">{{$usuario['name']}}</option>
                                        @endif                                    
                                    @endforeach
                                    @foreach($usuarios as $usuario)
                                        @if(Auth::user()->id!=$usuario['id'])
                                            <option value="{{$usuario['id']}}">{{$usuario['name']}}</option>
                                        @endif     
                                    @endforeach
                                </select>
                                <label for="">Jugador2</label>
                                <select name="IDJugador2" id="IDJugador2" class="form-control">
                                    @foreach($usuarios as $usuario)
                                        @if(Auth::user()->id!=$usuario['id'])
                                            <option value="{{$usuario['id']}}">{{$usuario['name']}}</option>
                                        @endif     
                                    @endforeach
                                </select>
                            </div>    

                            <div class="row">    
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label for="">Set Jugador1</label>
									<div class="form-group">
										<input type="number" name="PtosJugador1" id="PtosJugador1" class="form-control input-sm" >
                                    </div>
                                </div>
                				<div class="col-xs-6 col-sm-6 col-md-6">
                                        <label for="">Set Jugador2</label>
                                        <div class="form-group">
                                            <input type="number" name="PtosJugador2" id="PtosJugador2" class="form-control input-sm" >
                                        </div>
                                    </div>
                            </div>

                            
<!--
                            <div class="row">    
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label for="">Jugador1</label>
									<div class="form-group">
										<input type="number" name="PtosJugador1Set1" id="PtosJugador1Set1" class="form-control input-sm" >
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="PtosJugador1Set2" id="PtosJugador1Set2" class="form-control input-sm" >
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="PtosJugador1Set3" id="PtosJugador1Set3" class="form-control input-sm" >
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="PtosJugador1Set4" id="PtosJugador1Set4" class="form-control input-sm" >
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="PtosJugador1Set5" id="PtosJugador1Set5" class="form-control input-sm" >
                                    </div>
                                </div>
                				<div class="col-xs-6 col-sm-6 col-md-6">
                                        <label for="">Jugador2</label>
                                        <div class="form-group">
                                            <input type="number" name="PtosJugador2Set1" id="PtosJugador2Set1" class="form-control input-sm" >
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="PtosJugador2Set2" id="PtosJugador2Set2" class="form-control input-sm" >
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="PtosJugador2Set2" id="PtosJugador2Set2" class="form-control input-sm" >
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="PtosJugador2Set4" id="PtosJugador2Set4" class="form-control input-sm" >
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="PtosJugador2Set5" id="PtosJugador2Set5" class="form-control input-sm" >
                                        </div>
                                    </div>
                            </div>
                        -->							
 
								<div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit"  value="Guardar" class="btn btn-success btn-block"> 
                                <!-- <input type="button" value="Aceptar" class="btn btn-info btn-block"  onclick="javascript:fc_acepta_partido();"/> -->
                                    
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection