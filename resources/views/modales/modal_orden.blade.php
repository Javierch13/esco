<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Editar orden</h4>
      </div>
        <div class="modal-body">
       
                  <form id="form_orden_edit" method="POST" action="{{route('create_orden')}}">
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
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Si</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>