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

                        <h5 class="pt-3 pb-2 font-up col-md-push-6"><strong>Crear Orden</strong></h5>
                        <hr>

                         <form id="form_orden" method="POST" action="{{route('create_orden')}}">
                            <!-- Grid row -->
                             @csrf
                            
                            <input name="idOrd" type="hidden" id="id">
                            
                            <div class="row mt-2 mt-2">
                               <!-- Grid column -->
                                <div class="col-md-6">
                                  <div class="md-form">
                                    <label for="fecha_ejecucion" class="">Fecha Ejecucion</label>
                                    <input name="fecha_ejecucion" type="date" id="fecha_ejecucion" class="form-control validate">
                                  </div>
                            
                                </div>
                                <!-- Grid column -->

                                <div class="col-md-6">
                                  <div class="md-form">
                                    <label for="id_tipo" class="">Tipo Orden</label>
                                      <select name="id_tipo" id="id_tipo" class="form-control validate">
                                        <option value="">.................</option>
                                        @foreach($tipos as $item)
                                         <option value="{{$item->id_tipo}}">{{$item->nombre}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                            
                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row mt-2 -->

                            <div class="row mt-2 mt-2">
                               <!-- Grid column -->
                                <div class="col-md-6">
                                  <div class="md-form">
                                    <label for="id_operador" class="">Operador</label>
                                      <select name="id_operador" id="id_operador" class="form-control validate">
                                         <option value="">.................</option>
                                        @foreach($operadores as $item2)
                                         <option value="{{$item2->id_operador}}">{{$item2->nombre}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                            
                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-6">
                                  <div class="md-form">
                                    <label for="valor" class="">Valor</label>
                                      <input type="number" step="0.01" name="valor" id="valor" class="form-control">
                                  </div>
                            
                                </div>
                                <!-- Grid column -->

                            </div>

                            <!-- Grid row mt-2 -->

                            <div class="row mt-2 mt-2">
                                <!-- Grid column -->
                                <div class="col-md-12">
                                  <div class="md-form">
                                    <label for="resultado" class="">Resultado</label>
                                    <textarea name="resultado" id="resultado" class="form-control"></textarea>
                                  </div>
                            
                                </div>
                                <!-- Grid column -->

                            </div>
                             
                            <!-- Grid row -->
                            <div class="row mt-2 mr-2 float-right"> 
                             <p class="">
                              <button id="guardar" class="btn btn-secondary">  Guardar </button>
                             <!-- botones para editar un registro o cancelarlo -->
                              <button id="t-guardar" class="btn btn-info" style="display: none;">  Actualizar </button>
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
                     <h5 class="pt-3 pb-2 font-up col-md-push-6"><strong>Ordenes </strong></h5>
                  <div class="table-responsive">

                
              <table id="Tabla_ordenes" class="table table-bordred table-striped">
                   
                  <thead class="table-info"> 
                   <th><input name="" type="checkbox" id="checkall" /></th>
                    <th>F.Creacion</th>
                    <th>Tipo Orden</th>
                    <th>F.Asignacion</th>
                    <th>F.Ejecucion</th>
                    <th>Operador</th>
                    <th>Resultado</th>
                    <th>Valor</th>
                    <th>Editar</th>  
                    <th>Borrar</th>
                  </thead>
                   
                   <tbody> 
                    @foreach($ordenes as $value)
                    <tr class="col-{{$value->id_orden}}">
                     <td>{{$value->id_orden}}</td>
                     <td>{{$value->fecha_creacion}}</td>
                     <td>{{$value->tipo_orden}}</td>
                     <td>{{$value->fecha_asignacion}}</td>
                     <td>{{$value->fecha_ejecucion}}</td>
                     <td>{{$value->nombre_operador}}</td>
                     <td>{{($value->resultado)?$value->resultado:'----'}}</td>
                     <td>{{($value->valor)?$value->valor:'------'}}</td>
                     <td><a class="btn btn-primary btn-xs" id="editar_t" data-url="{{url('/tipos/tipo/'.$value->id_orden.'/edit')}}" data-title="Editar" data-id="{{$value->id_orden}}">Editar</a></td>
                     <td class="delete-{{$value->id_orden}}"><a class="btn btn-danger btn-xs" data-title="Delete" id="borrar_t" data-url="{{url('/tipos/tipo/'.$value->id_orden)}}" data-id="{{$value->id_orden}}">Borrar</a></td>
                    </tr>
                    @endforeach

                   </tbody>
                </table>
                  {{ $ordenes->links() }}

               </div>    

                        </div>
                    </div>
            
                </div>
                <!-- Grid column -->
            </div>
        </div>
    <!--MDB Inputs-->
 @include('modales.modal_borrar')
 @include('modales.modal_orden')
@endsection