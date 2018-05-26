$(document).ready(function(){
    $.getJSON("../php/operacion.php", {evento: "showEstadisticas"}, function(respuesta){
      $('#usuarios').html(respuesta[0]['count(id)']);
    });
    $.getJSON("../php/operacion.php", {evento: "showEclientes"}, function(respuesta){
      $('#clientes').html(respuesta[0]['count(id)']);
    });
    $.getJSON("../php/operacion.php", {evento: "showEproveedor"}, function(respuesta){
      $('#proveedores').html(respuesta[0]['count(id)']);
    });
    $.getJSON("../php/operacion.php", {evento: "showEproducto"}, function(respuesta){
      $('#productos').html(respuesta[0]['count(id)']);
    });
    $.getJSON("../php/operacion.php", {evento: "showEventas"}, function(respuesta){
      $('#ventas').html(respuesta[0]['count(id)']);
    });


    $.getJSON("../php/operacion.php", {evento: "noti"}, function(respuesta){
        console.log(respuesta.length);
      if(respuesta.length>0){
          $('#notify').attr('class','zmdi zmdi-notifications-active');
          $('#notify').html(""+respuesta.length);
          for (var i = 0; i < respuesta.length; i++) {
            $('#noti1').append('<li><a href="#" class="Notification" id="notifation-read-2"><div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div><div class="Notification-text"><p><strong>'+respuesta[i].producto_productos+'</strong> <br><strong>'+respuesta[i].cantidad+' Unidades</strong></p></div><div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-2">Notification as Read</div></a></li>');
          }
      }else{
        $('#notify').attr('class','zmdi zmdi-notifications');
        $('#notify').html(""+0);
      }
    });

    /*$('#agregar').on('click',function(e){
        e.preventDefault();
        swal({
		  	title: 'Desea Registrar un Nuevo Ingreso?',
  		 	text: "Se modificara tambien el Almacen",
  		  	type: 'info',
  		  	showCancelButton: true,
  		  	confirmButtonText: 'Si, Registrar',
  		  	closeOnConfirm: true
  		  },
    		function(isConfirm) {
    		  	if (isConfirm) {
    		    	var datos=$('#formIngreso').serialize();
                //console.log(datos);
                $.ajax({
                  url:'../php/registros.php',
                  type:'post',
                  data: "valor=registrarIngreso"+"&"+datos,
                  beforeSend:function(){
                      $('.faocu').css('display','inline')
                  },
                  success: function(resp){
                      swal(
                        'Registro Insertado',
                        'Se añadio un nuevo Ingreso al Almacen Nro. '+resp,
                        'success'
                      )
                  },
                  error:function(jqXHR,estado,error){
                      swal(
                        'Ocurrio un Error',
                        'tipo de error '+resp,
                        'error'
                      )
                      console.log(error)
                  },
                  complete:function(jqXHR,estado){
                      $('#agregar').hide();
                      $('#nuevo1').show();
                  }
                });
    		  	}
    		});
    });
    $("#searchAdmin" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.mdl-list__item').hide();
      $('.mdl-list__item').filter(function () {
          return rex.test($(this).text());
      }).show();
    });*/
});

function cargar(){
    $('#producto').empty();
    $.getJSON('../php/operacion.php',{evento:"selectProducto"},function(resp){
    for (var i = 0; i < resp.length; i++) {
        $('#producto').append("<option value='"+resp[i].cod_producto+"'>"+resp[i].producto_productos+"</option>");
    }
    });
}
function cargar2(){
    $('#proveedor').empty();
    $.getJSON('../php/operacion.php',{evento:"selectProveedor"},function(resp){
      for (var i = 0; i < resp.length; i++) {
          $('#proveedor').append("<option value='"+resp[i].cod_proveedor+"'>"+resp[i].razon_proveedor+"</option>");
      }
    });
}
function cargar3(){
    $('#personal').empty();
    $.getJSON('../php/operacion.php',{evento:"selectPersonal"},function(resp){
      for (var i = 0; i < resp.length; i++) {
          $('#personal').append("<option value='"+resp[i].cod_personal+"'>"+resp[i].nombre_usuario+" "+resp[i].apellido_usuario+"</option>");
      }
    });
}