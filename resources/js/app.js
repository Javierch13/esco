/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {
/***** Para Operadores ********************************/

$("#form_operadores").on("click","#guardar",function(e){
          e.preventDefault();

  var control = true;
  var arr = $(".validate");

	  if (arr.length > 0) {
	    for (i = 0; i < arr.length; i++) {
	      if (arr[i].value === '' || arr[i].value === null || arr[i].value === " ") {
	          //alert("El campo '"+  arr[i].id + "' no puede estar vacio"); //Si quieres que imprima en específico que campo no puede dejar vacío
	          
	          $("#"+arr[i].id).css("border", "red solid 1px"); 
	          $("#"+arr[i].id).siblings('span').remove(); 
	          $("#"+arr[i].id).after("<span class='text-danger'>Este campo es obligatorio</span>"); 

	          control = false;
	         // break;
	      }
	    }
	  }

  if (control) {

     var datosRegistro = $("#form_operadores").serialize();
     var formUrl = $("#form_operadores").attr("action");
     var rows = "";

     $.ajax({
       type: "POST",
       url:  formUrl,
       data: datosRegistro,
       beforeSend: function(){
       },
       success: function(data) {

       	if(data.status == "200"){

       	  //alert('Registro guardado');
       	   $("#form_operadores")[0].reset();
       	   swal("Correcto!",'Registro Guardado', "success");
       	}

       	value = data.data;

       	urlEdit = "operador"+"/"+value.id_operador+"/"+"edit";

       	//insertar nuevo registro en la tabla
       	rows = rows + '<tr id="col-'+value.id_operador+'">';
	  	rows = rows + '<td></td>';
	  	rows = rows + '<td>'+value.nombre+'</td>';
        rows = rows + '<td data-id="'+value.id_operador+'">';
        rows = rows + '<a class="btn btn-primary btn-xs" id="editar_o" data-url="{{url('+urlEdit+')}}" data-title="Editar" data-id="'+value.id_operador+'">Editar</a> ';
        rows = rows + '</td>';
	  	rows = rows + '<td class="Delete'+value.id_operador+'">';
        rows = rows + '<a class="btn btn-danger btn-xs" data-title="Delete" id="borrar_o" data-toggle="modal" data-url="{{url("operador/'+value.id_operador+'")}}" data-target="#delete" data-id="'+value.id_operador+'">Borrar</a>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';

       $("#Tabla_operadores tbody").append(rows);

      }//fin del success
     });
  }else{

  	alert("Faltan campos por llenar"); //o el mensaje para todos
  }

});

//voy a editar un registro

$("#Tabla_operadores").on("click","#editar_o",function(e){
          e.preventDefault();

  var objet = $(this);
  var id = $(this).data('id');
  var rows = $(this).parents('td').parents('tr');
  var url = $(this).data('url');

     $.ajax({
       type: "GET",
       url:  url,
       data: {"id":id},
       beforeSend: function(){
       },
       success: function(data) {

       	if(data.status == "200"){
       	 console.log(data.data);

       	 values = data.data; //simplificar el resultado

       	  $("#form_operadores")[0].reset();
       	  
       	  $("#form_operadores #nombres").val(values.nombre);
       	  $("#form_operadores #id").val(values.id_operador);

       	  //ahora los botones que sirven para editar
       	  $("#form_operadores #guardar").hide();//ocultar el de guardado

       	  $("#form_operadores #o-guardar").show();//mostrar actualizar
       	  $("#form_operadores #cancelar").show();//mostrar cancelar

       	   objet.hide();//deshabilito el boton de editar de la tabla
       	   $("#Tabla_operadores .delete-"+values.id_operador).hide();//ocultar el de delete

       	   rows.hide();

       	 // swal("Done!",'Registro Actualizado', "success");
       	}

      }//fin del success
     });

});

   //cancelo el editar y refresco para 
    $("#form_operadores").on("click","#cancelar",function(e){
          e.preventDefault();

        window.location.reload();

    });
  // funcion llena tablas con los registros ya actualizados

$("#form_operadores").on("click","#o-guardar",function(e){
          e.preventDefault();

    var control = true;
    var arr = $(".validate");
    var objet = $("#form_operadores #id").val();

	  if (arr.length > 0) {
	    for (i = 0; i < arr.length; i++) {
	      if (arr[i].value === '' || arr[i].value === null || arr[i].value === " ") {
	          //alert("El campo '"+  arr[i].id + "' no puede estar vacio"); //Si quieres que imprima en específico que campo no puede dejar vacío
	          
	          $("#"+arr[i].id).css("border", "red solid 1px"); 
	          $("#"+arr[i].id).siblings('span').remove(); 
	          $("#"+arr[i].id).after("<span class='text-danger'>Este campo es obligatorio</span>"); 

	          control = false;
	         // break;
	      }
	    }
	  }

  if (control) {

     var datosRegistro = $("#form_operadores").serialize();
     var formUrl = $("#form_operadores").attr("action");
     var rows = "";

     formUrl = formUrl+'/'+objet; //reescribiendo url para editar

     $.ajax({
       type: "PUT",
       url:  formUrl,
       data: datosRegistro,
       beforeSend: function(){
       },
       success: function(data) {

       	if(data.status == "200"){

       	 // alert('Registro Actualizado');

       	   $("#form_operadores")[0].reset();
       	   $("#form_operadores #id").val();

       	   swal("Correcto!",'Registro Guardado', "success");

       	   $("#col-"+objet).remove();

       	   value = data.data;

       	//insertar nuevo registro en la tabla
       	rows = rows + '<tr id="col-'+value.id_operador+'">';
	  	rows = rows + '<td></td>';
	  	rows = rows + '<td>'+value.nombre+'</td>';
        rows = rows + '<td data-id="'+value.id_operador+'">';
        rows = rows + '<a class="btn btn-primary btn-xs" id="editar_o" data-url="{{url("operador/'+value.id_operador+'/edit")}}" data-title="Editar" data-id="'+value.id_operador+'">Editar</a> ';
        rows = rows + '</td>';
	  	rows = rows + '<td class="Delete'+value.id_operador+'">';
        rows = rows + '<a class="btn btn-danger btn-xs" data-title="Delete" id="borrar_o" data-toggle="modal" data-url="{{url("operador/'+value.id_operador+')}}" data-target="#delete" data-id="'+value.id_operador+'">Borrar</a>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';

          $("#Tabla_operadores tbody").append(rows);

          $("#form_operadores #guardar").show();//ocultar el de guardado

       	  $("#form_operadores #o-guardar").hide();//mostrar actualizar
       	  $("#form_operadores #cancelar").hide();//mostrar cancelar
       	}

      }//fin del success
     });
  }else{

  	alert("Faltan campos por llenar"); //o el mensaje para todos
  }

});

  //cancelo el editar y refresco para 
    $("#Tabla_operadores").on("click","#borrar_o",function(e){
                e.preventDefault();

        url = $(this).data('url');
        objet = $(this).parents('td').parents('tr');

	       	   objet.remove();

        $.ajax({
	       type: "DELETE",
	       url:  url,
	       beforeSend: function(){
	       },
	       success: function(data) {

	       	 if(data.status == "200"){
	       	  //alert('Registro guardado');
	       	   $("#form_operadores")[0].reset();
	       	   swal("Correcto!",'Se borro el reguistro', "success");
	       	 }
       	   }

         //window.location.reload();
        });
    });
  // funcion llena tablas con los registros ya actualizados
});
