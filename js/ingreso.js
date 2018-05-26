$(document).ready(function(){
    $('#nuevo1').hide();
    cargar();
    cargar2();
    cargar3();
    $.getJSON("../php/operacion.php", {evento: "mostrarIngresos"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".mdl-list").append('<div class="mdl-list__item mdl-list__item--two-line"><span class="mdl-list__item-primary-content"><i class="zmdi zmdi-account mdl-list__item-avatar"></i><span>'+respuesta[i].producto_productos+' '+respuesta[i].cantidad_ad+' UNIDADES</span><span class="mdl-list__item-sub-title">PROVEEDOR '+respuesta[i].razon_proveedor+'</span><span class="mdl-list__item-sub-title">FECHA DE INGRESO '+respuesta[i].fechai_ad+'</span></span><a id="showdatos" class="mdl-list__item-secondary-action" href="modificarIngresos.php?id='+respuesta[i].id+'"><i class="zmdi zmdi-more"></i></a></div>');
      }
    });

    $.getJSON("../php/operacion.php", {evento: "mostrarProductos"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        if (respuesta[i].foto_producto=="") {
          respuesta[i].foto_producto="default.jpg";
        }
        $(".contenedor1").append('<div class="mdl-card mdl-shadow--2dp full-width product-card"><div class="mdl-card__title"><img src="../img/'+respuesta[i].foto_producto+'" alt="product" class="img-responsive"></div>'+respuesta[i].cantidad+' unidades<div class="mdl-card__actions mdl-card--border">'+respuesta[i].producto_productos+' '+respuesta[i].marca_producto+'<a href="modificarProducto.php?id='+respuesta[i].id+'" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"></a></div></div>');
      }
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
    $('#agregar').on('click',function(e){
        e.preventDefault();
        var cantidad1=$('#cantidad').val();
        var fecha1=$('#fechai').val();
        var fecha2=$('#fechav').val();
        if (cantidad1=="" || fecha2=="" || fecha1=="") {
          swal(
            'Los Siguientes Campos Son Requeridos',
            '*Cantidad *fecha de ingreso *fecha de vencimiento',
            'error'
          )
        }else{
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
        }
    });
    $("#searchAdmin" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.mdl-list__item').hide();
      $('.mdl-list__item').filter(function () {
          return rex.test($(this).text());
      }).show();
    });


    $("#precio").keyup(function(e){
      e.preventDefault();
      var p=$('#precio').val();
      var c=$('#cantidad').val();
      $('#monto').attr("value",p*c);
    });


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