$(document).ready(function(){
    $('#nuevo1').hide();
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
        var nombre1=$('#nombre').val();
        var apellido1=$('#apellido').val();
        var cargo1=$('#cargo').val();
        var direccion1=$('#direccion').val();
        var celular1=$('#celular').val();
        var usuario1=$('#usuario').val();
        var pass1=$('#pass').val();
        var privi1=$('#options').val();
        console.log(carnet1);
        if (carnet1=="" || nombre1=="" || apellido1=="" || cargo1=="" || direccion1=="" || celular1=="" || usuario1=="" || pass1=="" || privi1=="" ) {
          swal(
            'LLENE TODOS Los Campos',
            'No puede dejar campos en blanco',
            'error'
          )
        }else{
          swal({
          title: 'Desea Registrar Usuario?',
          text: "Se agregara un nuevo usuario",
            type: 'warning',
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
                    data: "valor=registrarPersonal"+"&"+datos,
                    beforeSend:function(){
                        $('.faocu').css('display','inline')
                    },
                    success: function(resp){
                        swal(
                          'Registro Insertado',
                          'Se añadio un nuevo Usuario Nro. '+resp,
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
    $.getJSON("../php/operacion.php", {evento: "mostrarUsuarios"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".mdl-list").append('<div class="mdl-list__item mdl-list__item--two-line"><span class="mdl-list__item-primary-content"><i class="zmdi zmdi-account mdl-list__item-avatar"></i><span>'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'</span><span class="mdl-list__item-sub-title">'+respuesta[i].cargo_usuario+'</span></span><a id="showdatos" class="mdl-list__item-secondary-action" href="modificarUsuario.php?id='+respuesta[i].id+'"><i class="zmdi zmdi-more"></i></a></div>');
      }
    });
    $( "#searchAdmin" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.mdl-list__item ').hide();
      $('.mdl-list__item ').filter(function () {
          return rex.test($(this).text());
      }).show();
    });
})