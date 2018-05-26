$(document).ready(function(){
    $('#nuevo1').hide();
    cargar();
    $.getJSON("../php/operacion.php", {evento: "mostrarServ"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".mdl-list").append('<div class="mdl-list__item mdl-list__item--two-line"><span class="mdl-list__item-primary-content"><i class="zmdi zmdi-account mdl-list__item-avatar"></i><span>'+respuesta[i].nombre_servicio+'</span><span class="mdl-list__item-sub-title">'+respuesta[i].descripcion+'</span></span><a id="showdatos" class="mdl-list__item-secondary-action" href="modificarService.php?id='+respuesta[i].id+'"><i class="zmdi zmdi-more"></i></a></div>');
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
    $('#registrar3').on('click',function(e){
        e.preventDefault();
        var nombre1=$('#nombre2').val();
        var codigo1=$('#codigo2').val();
        var descripcion1=$('#descripcion2').val();
        if (nombre1=="" || codigo1=="" || descripcion1=="") {
          swal(
            'Los Siguientes Campos Son Requeridos',
            '*Nombre *Codigo *Descripcion',
            'error'
          )
        }else{
                var datos=$('#registrarService2').serialize();
                  //console.log(datos);
                  $.ajax({
                    url:'../php/registros.php',
                    type:'post',
                    data: "valor=registrarServicio"+"&"+datos,
                    beforeSend:function(){
                        $('.faocu').css('display','inline')
                    },
                    success: function(resp){
                        $('#mensaje3').html("Registro Insertado Nro "+resp);
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
                        cargar();
                        $(this).hide();     
                    }
                  });
        }
        
    });

    $('#registrar').on('click',function(e){
        e.preventDefault();
        var nombre1=$('#nombre').val();
        var descripcion1=$('#descripcion').val();
        if (nombre1=="" || descripcion1=="") {
          swal(
            'Los Siguientes Campos Son Requeridos',
            '*Nombre *Descripcion',
            'error'
          )
        }else{
          swal({
          title: 'Desea Registrar un Servicio?',
          text: "Se agregara un nuevo Servicio",
            type: 'info',
            showCancelButton: true,
            confirmButtonText: 'Si, Registrar',
            closeOnConfirm: true
          },
          function(isConfirm) {
              if (isConfirm) {
                var datos=$('#registrarService').serialize();
                  console.log(datos);
                  $.ajax({
                    url:'../php/registros.php',
                    type:'post',
                    data: "valor=registrarService"+"&"+datos,
                    beforeSend:function(){
                        $('.faocu').css('display','inline')
                    },
                    success: function(resp){
                        swal(
                          'Registro Insertado',
                          'Se añadio un nuevo Servicio Nro. '+resp,
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

    /*$('#registrar').on('click',function(e){
        e.preventDefault();
        var presentaciones=new Array();
        var i=1;
        $('#tabVenta tr').find("td").each(function(){
            presentaciones[i]=$(this).html();
            i++;
        });
        var datos=$('#registrarVenta').serialize();
        
        var cliente1=$('#cliente').val();
        var personal1=$('#personal').val();
        if (cliente1=="" || personal1=="") {
          swal(
            'Los Siguientes Campos Son Requeridos',
            '*Nombre *usuario',
            'error'
          )
        }else{
          swal({
            title: 'Registrar Venta?',
            text: "Se creara un nueva Venta!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Registrar!'
          }).then(function () {
                  $.ajax({
                    url:'../php/registros.php',
                    type:'post',
                    data: "valor=registrarServ"+"&"+datos+"&tabla="+presentaciones,
                    beforeSend:function(){
                        $('.faocu').css('display','inline')
                    },
                    success: function(resp){
                        swal(
                          'Venta Registrada',
                          'Se añadio una nueva venta Nro. '+resp,
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
            swal(
              'Registrado!',
              'Correctamente.',
              'success'
            )
          })  
        }
        
    });*/
    /*$("#searchAdmin" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.mdl-list__item ').hide();
      $('.mdl-list__item ').filter(function () {
          return rex.test($(this).text());
      }).show();
    });*/
});
function cargar(){
  $('#tipo').empty();
    $.getJSON('../php/operacion.php',{evento:"mostrarServicios"},function(resp){
    for (var i = 0; i < resp.length; i++) {
        $('#tipo').append("<option value='"+resp[i].cod_tipo+"'>"+resp[i].nombre_tipo+"</option>");
    }
  });
}