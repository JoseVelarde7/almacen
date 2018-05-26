$(document).ready(function(){
    $('#nuevo1').hide();
    $('#nfactura').hide();
    $.getJSON("../php/operacion.php", {evento: "mostrarServicios"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".mdl-list").append('<div class="mdl-list__item mdl-list__item--two-line"><span class="mdl-list__item-primary-content"><i class="zmdi zmdi-account mdl-list__item-avatar"></i><span>'+respuesta[i].nombre_tipo+'</span><span class="mdl-list__item-sub-title">'+respuesta[i].cod_tipo+'</span></span><a id="showdatos" class="mdl-list__item-secondary-action" href="modificarServicio.php?id='+respuesta[i].id+'"><i class="zmdi zmdi-more"></i></a></div>');
      }
    });
    $('#registrar').on('click',function(e){
        e.preventDefault();
        var nombre1=$('#nombre').val();
        var codigo1=$('#codigo').val();
        var descripcion1=$('#descripcion').val();
        if (nombre1=="" || codigo1=="" || descripcion1=="") {
          swal(
            'Los Siguientes Campos Son Requeridos',
            '*Nombre *Codigo *Descripcion',
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
                  //console.log(datos);
                  $.ajax({
                    url:'../php/registros.php',
                    type:'post',
                    data: "valor=registrarServicio"+"&"+datos,
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
    $("#searchAdmin" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.mdl-list__item ').hide();
      $('.mdl-list__item ').filter(function () {
          return rex.test($(this).text());
      }).show();
    });
})