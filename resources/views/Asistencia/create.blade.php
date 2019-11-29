<!--
<link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../../../bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
-->
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
                        <h3 class="panel-title">Asistencia</h3>
                    </div>

                                
                    
                    <!--
                    <div class="form-group">
                        <label for="dtp_input1" class="col-md-2 control-label">DateTime Picking</label>
                        <div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                            <input class="form-control" size="16" type="text" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" /><br/>
                    </div>
                    -->
                    <div class="panel-body">					
                        <div class="table-container">
                            <form method="POST" name="form1" action="{{ route('asistencia.store') }}"  role="form">
                                <div class="form-group row">
                                    <label for="fecha" class="col-sm-1 col-form-label">Fecha</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext" name="FechaAsiste" id="FechaAsiste" value="{{date("d-m-Y")}}">
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead class="success">
                                       <th>Alumno</th>
                                       <th>Asiste</th>
                                    <tbody>
                                        @foreach($usuarios as $usuario) 
                                        <tr>
                                           <td>{{$usuario['name']}}</td>
                                           <td><input type="checkbox" name="alumnoAsiste[]" value="{{$usuario['id']}}"></td>
                                        </tr>
                                        @endforeach 
                                   </tbody>
                                 </table>
                                </div>
    
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
<!--        
        <script type="text/javascript" src="../../../bootstrap/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="../../../bootstrap/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
        
        <script type="text/javascript">
            $('.form_datetime').datetimepicker({
                //language:  'fr',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });
        </script>
    -->

