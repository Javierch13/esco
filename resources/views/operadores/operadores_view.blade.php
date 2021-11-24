@extends('layouts.app')
@section('content')

        <!--MDB Inputs-->
        <div class="container mt-4">

          <!-- Grid row -->
           <div class="row">
            
                <!-- Grid column -->
                <div class="col-md-12">
            
                    <div class="card">
                      <div class="card-body">

                        <h5 class="pt-3 pb-2 font-up col-md-push-6"><strong> Agregar Operador</strong></h5>
                        <hr>

                         <form id="form_operadores" method="POST" action="{{route('create_operador')}}">
                            <!-- Grid row -->
                             @csrf
                            
                            <input name="idOper" type="hidden" id="id">
                            
                            <div class="row mt-2 mt-2">
                                <!-- Grid column -->
                                <div class="col-md-6">
                                  <div class="md-form">
                                    <label for="form2" class="">Nombres</label>
                                    <input name="nombre" type="text" id="nombres" class="form-control validate">
                                  </div>
                            
                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row mt-2 -->
                             
                            <!-- Grid row -->
                            <div class="row mt-2 mr-2 float-right"> 
                             <p class="">
                              <button id="guardar" class="btn btn-secondary">  Guardar </button>
                             <!-- botones para editar un registro o cancelarlo -->
                              <button id="o-guardar" class="btn btn-info" style="display: none;">  Actualizar </button>
                              <button id="cancelar" class="btn btn-danger" style="display: none;"> Cancelar </button>
                             </p>
                            </div>
                          </form>
                        </div>
                    </div>
            
                </div>
                <!-- Grid column -->
            
            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="row mt-3">
            
              <!-- Grid column -->
              <div class="col-md-12">
            
                  <div class="card">
                    <div class="card-body">
                     <h5 class="pt-3 pb-2 font-up col-md-push-6"><strong>Operadores </strong></h5>
                  <div class="table-responsive">

                
              <table id="Tabla_operadores" class="table table-bordred table-striped">
                   
                  <thead class="table-info"> 
                   <th><input name="" type="checkbox" id="checkall" /></th>
                    <th>Nombres</th>
                    <th>Editar</th>  
                    <th>Borrar</th>
                  </thead>
                   
                   <tbody> 
                    @foreach($operadores as $value)
                    <tr class="col-{{$value->id_operador}}">
                     <td><input type="checkbox" class="checkthis" /></td>
                     <td>{{$value->nombre}}</td>
                     <td><a class="btn btn-primary btn-xs" id="editar_o" data-url="{{url('/operadores/operador/'.$value->id_operador.'/edit')}}" data-title="Editar" data-id="{{$value->id_operador}}">Editar</a></td>
                     <td class="delete-{{$value->id_operador}}"><a class="btn btn-danger btn-xs" data-title="Delete" id="borrar_o" data-url="{{url('/operadores/operador/'.$value->id_operador)}}" data-id="{{$value->id_operador}}">Borrar</a></td>
                    </tr>
                    @endforeach

                   </tbody>
                </table>
                  {{ $operadores->links() }}

               </div>    

                        </div>
                    </div>
            
                </div>
                <!-- Grid column -->
            </div>
        </div>
    <!--MDB Inputs-->
 @include('modales.modal_borrar')
@endsection