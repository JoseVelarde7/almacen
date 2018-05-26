$(document).ready(function(){
    $('#nuevo1').hide();
    $.getJSON("../php/operacion.php", {evento: "mostrarProveedores"}, function(respuesta){
      var i;
      //console.log(respuesta);
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".mdl-list").append('<div class="mdl-list__item mdl-list__item--two-line"><span class="mdl-list__item-primary-content"><i class="zmdi zmdi-truck mdl-list__item-avatar"></i><span>'+respuesta[i].razon_proveedor+'</span><span class="mdl-list__item-sub-title">'+respuesta[i].direccion_proveedor+'</span><span class="mdl-list__item-sub-title">'+respuesta[i].celular_proveedor+'</span></span></span><a id="showdatos" class="mdl-list__item-secondary-action" href="modificarProveedor.php?id='+respuesta[i].id+'"><i class="zmdi zmdi-more"></i></a></div>');
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
        var carnet1=$('#carnet').val();
        var nombre1=$('#razon').val();
        var celular1=$('#celular').val();
        var direccion1=$('#direccion').val();
        console.log(carnet1);
        if (carnet1=="" || nombre1=="" || celular1=="" || direccion1=="" ) {
          swal(
            'Los Siguientes Campos Son Requeridos',
            '*Carnet *Razon Social *Celular *Direccion',
            'error'
          )
        }else{
          swal({
          title: 'Desea Registrar un Proveedor?',
          text: "Se agregara un nuevo Proveedor",
            type: 'info',
            showCancelButton: true,
            confirmButtonText: 'Si, Registrar',
            closeOnConfirm: true
          },
          function(isConfirm) {
              if (isConfirm) {
                var datos=$('#registraruser').serialize();
                console.log(datos);
                  $.ajax({
                    url:'../php/registros.php',
                    type:'post',
                    data: "valor=registrarProveedor"+"&"+datos,
                    beforeSend:function(){
                        $('.faocu').css('display','inline')
                    },
                    success: function(resp){
                        swal(
                          'Registro Insertado',
                          'Se añadio un nuevo Proveedor Nro. '+resp,
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
    $("#searchProvider" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.mdl-list__item ').hide();
      $('.mdl-list__item ').filter(function () {
          return rex.test($(this).text());
      }).show();
    });
})