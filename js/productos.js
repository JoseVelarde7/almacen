$(document).ready(function(){
    $('#nuevo1').hide();
    cargar();
    cargar2();
    $.getJSON("../php/operacion.php", {evento: "mostrarProductos2"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        if (respuesta[i].foto_producto=="") {
          respuesta[i].foto_producto="default.jpg";
        }
        $(".contenedor1").append('<div class="mdl-card mdl-shadow--2dp full-width product-card"><div class="mdl-card__title"><img src="../img/'+respuesta[i].foto_producto+'" alt="product" class="img-responsive"></div><div class="mdl-card__supporting-text"<small>Precio: </small><br><small>'+respuesta[i].precio_productos+'</small></div><div class="mdl-card__actions mdl-card--border">'+respuesta[i].producto_productos+' '+respuesta[i].marca_producto+'<a href="modificarProducto.php?id='+respuesta[i].id+'" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></a></div></div>');
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
    $('#registrar').on('click',function(e){
        e.preventDefault();
        var carnet1=$('#codigo').val();
        var nombre1=$('#nombre').val();
        var marca1=$('#marca').val();
        console.log(carnet1);
        if (carnet1=="" || nombre1=="" || marca1=="") {
          swal(
            'Los Siguientes Campos son Obligatorios',
            '*Codigo *Nombre *Marca',
            'error'
          )
        }else{
          swal({
          title: 'Desea Registrar el Producto?',
          text: "Se agregara un nuevo Producto",
            type: 'info',
            showCancelButton: true,
            confirmButtonText: 'Si, Registrar',
            closeOnConfirm: true
          },
          function(isConfirm) {
              if (isConfirm) {
                var datos=$('#formregistrar').serialize();
                  console.log(datos);
                  $.ajax({
                    url:'../php/registros.php',
                    type:'post',
                    data: "valor=registrarProducto"+"&"+datos,
                    beforeSend:function(){
                        $('.faocu').css('display','inline')
                    },
                    success: function(resp){
                        swal(
                          'Registro Insertado',
                          'Se añadio un nuevo Producto Nro. '+resp,
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
                        $('#registrar').hide();
                        $('#nuevo1').show();
                    }
                  });
              }
          });  
        } 
    });
    $('#regCategoria').on('click',function(e){
      e.preventDefault();
      var codigo=$('#codCat').val();
      var nombre=$('#nombreCat').val();
      //console.log(codigo+" "+nombre);
        $.ajax({
          url:'../php/registros.php',
          type:'post',
          data: "valor=registrarCategoria"+"&codigo="+codigo+"&nombre="+nombre,
          beforeSend:function(){
              $('.faocu').css('display','inline')
          },
          success: function(resp){
              $('#message').html("Registro Insertado Nro "+resp);
          },
          error:function(jqXHR,estado,error){
              $('#message').html("error "+error);
              console.log(error)
          },
          complete:function(jqXHR,estado){
              $('#regCategoria').hide();
              cargar2();
          }
        });
    });
    $('#regUnidad').on('click',function(e){
      e.preventDefault();
      var codigo=$('#codUn').val();
      var nombre=$('#nombreUn').val();
      //console.log(codigo+" "+nombre);
        $.ajax({
          url:'../php/registros.php',
          type:'post',
          data: "valor=registrarUnidad"+"&codigo="+codigo+"&nombre="+nombre,
          beforeSend:function(){
              $('.faocu').css('display','inline')
          },
          success: function(resp){
              $('#message2').html("Registro Insertado Nro "+resp);
          },
          error:function(jqXHR,estado,error){
              $('#message2').html("error "+error);
              console.log(error)
          },
          complete:function(jqXHR,estado){
              $('#regUnidad').hide();
              cargar();
          }
        });
    });
    $("#searchProduct" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.product-card').hide();
      $('.product-card').filter(function () {
          return rex.test($(this).text());
      }).show();
    });
});

function cargar(){
    $('#unidad').empty();
    $.getJSON('../php/operacion.php',{evento:"mostrarUnidades"},function(resp){
    for (var i = 0; i < resp.length; i++) {
        $('#unidad').append("<option value='"+resp[i].cod_unidad+"'>"+resp[i].unidad_unidades+"</option>");
    }
    });
}
function cargar2(){
    $('#tipo').empty();
    $.getJSON('../php/operacion.php',{evento:"mostrarCategoria"},function(resp){
      for (var i = 0; i < resp.length; i++) {
          $('#tipo').append("<option value='"+resp[i].cod_categoria+"'>"+resp[i].nombre_categoria+"</option>");
      }
    });
}