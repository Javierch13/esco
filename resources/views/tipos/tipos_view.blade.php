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

                        <h5 class="pt-3 pb-2 font-up col-md-push-6"><strong> Agregar Tipo</strong></h5>
                        <hr>

                         <form id="form_tipo" method="POST" action="{{route('create_tipo')}}">
                            <!-- Grid row -->
                             @csrf
                            
                            <input name="idTip" type="hidden" id="id">
                            
                            <div class="row mt-2 mt-2">
                                <!-- Grid column -->
                                <div class="col-md-6">
                                  <div class="md-form">
                                    <label for="form2" class="">Nombre</label>
                                    <input name="nombre" type="text" id="nombre" class="form-control validate">
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
                     <h5 class="pt-3 pb-2 font-up col-md-push-6"><strong>Tipos </strong></h5>
                  <div class="table-responsive">

                
              <table id="Tabla_tipos" class="table table-bordred table-striped">
                   
                  <thead class="table-info"> 
                   <th><input name="" type="checkbox" id="checkall" /></th>
                    <th>Nombre</th>
                    <th>Editar</th>  
                    <th>Borrar</th>
                  </thead>
                   
                   <tbody> 
                    @foreach($tipos as $value)
                    <tr class="col-{{$value->id_tipo}}">
                     <td><input type="checkbox" class="checkthis" /></td>
                     <td>{{$value->nombre}}</td>
                     <td><a class="btn btn-primary btn-xs" id="editar_t" data-url="{{url('/tipos/tipo/'.$value->id_tipo.'/edit')}}" data-title="Editar" data-id="{{$value->id_tipo}}">Editar</a></td>
                     <td class="delete-{{$value->id_tipo}}"><a class="btn btn-danger btn-xs" data-title="Delete" id="borrar_t" data-url="{{url('/tipos/tipo/'.$value->id_tipo)}}" data-id="{{$value->id_tipo}}">Borrar</a></td>
                    </tr>
                    @endforeach

                   </tbody>
                </table>
                  {{ $tipos->links() }}

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