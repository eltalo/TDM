<script language="javascript">
    function fnc_Copia()
    {
        var indice = document.form1.lec.selectedIndex;
        <!-- alert(document.form1.lec.options[indice].text); -->
        document.form1.Leccion.value = document.form1.lec.options[indice].text;
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
                        <h3 class="panel-title">Clase</h3>
                    </div>

                    <div class="panel-body">					
                        <div class="table-container">

                            <form name ="form1" method="POST" action="{{ route('clase.store') }}"  role="form">
                                {{ csrf_field() }}
                                <div class="row">

    

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm" name="FechaClase" id="FechaClase" value="{{date("d-m-Y")}}">
                                        </div>
                                       <!--
                                        <div class="form-group">
                                            <label>Leccion</label>
                                            <input type="text" name="Leccion" id="Leccion" class="form-control input-sm" placeholder="Leccion">
                                        </div>
                                    -->
                                       
                                        <div class="Leccion">
                                            Leccion
                                            <!--
                                            <select name="lec" id="lec" class="form-control" onclick="fnc_Copia();">
                                            -->
                                            <select name="lec" id="lec" class="form-control">
                                                @foreach($lecciones as $lec)
                                                    <option value="{{$lec->Leccion}}">{{$lec->Leccion}}</option>
                                                @endforeach
                                            </select>
                                            <textarea rows="4", cols="20" class="form-control input-sm" id="Leccion" name="Leccion" style="resize:none, "></textarea>
                                        </div>	
                                    
                                        
                                        <input type="button" value="Copiar" class="btn btn-warning" onclick="javascript:fnc_Copia();"/> 
                                        
                                        <div class="form-group">
                                            <label>Tiempo</label>
                                            <input type="numbers" name="Tiempo" id="Tiempo" class="form-control input-sm" value="10" placeholder="Tiempo">
                                        </div>

    

                                        <div class="form-group">
                                            <label for="Local">Local</label>
                                            <select name="Local" id="Local" class="form-control">
                                                @foreach($locals as $loc)
                                                    <option value="{{$loc->id}}">{{$loc->name}}</option>
                                                @endforeach
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


