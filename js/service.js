$(document).ready(function(){
    $('#nuevo1').hide();
    $.getJSON("../php/operacion.php", {evento: "mostrarTabservicios"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".contenedor21").append('<tr><td class="mdl-data-table__cell--non-numeric">'+respuesta[i].fecha_servicio+'</td><td>'+respuesta[i].nombre_cliente+'</td><td>'+respuesta[i].costo_servicio+'</td><td>'+respuesta[i].notas+'</td><td><a onclick="funcion(\''+respuesta[i].fecha_servicio+'\',\''+respuesta[i].cod_cliente+'\',\''+respuesta[i].nombre_cliente+'\',\''+respuesta[i].codigoventa+'\')" href="#modal2" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></a></td></tr>');
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
                        $('#nfactura').css('display','inline');
                    }
                  });
            swal(
              'Registrado!',
              'Correctamente.',
              'success'
            )
          })  
        }
        
    });
    /*$("#searchAdmin" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.mdl-list__item ').hide();
      $('.mdl-list__item ').filter(function () {
          return rex.test($(this).text());
      }).show();
    });*/
    $.getJSON("../php/operacion.php", {evento: "mostrarClientes"}, function(respuesta){
      var options = {
        data: respuesta,
        getValue: "nombre_cliente",
        list: {
          onSelectItemEvent: function() {
            var value = $("#cliente").getSelectedItemData().cod_cliente;
            $("#codcli").val(value).trigger("change");
          },
          match: {
            enabled: true
          }
        }
      };
      $("#cliente").easyAutocomplete(options);
    });
    $.getJSON("../php/operacion.php", {evento: "mostrarUsuarios"}, function(respuesta){
      var options = {
        data: respuesta,
        getValue: "nombre_usuario",
        list: {
          onSelectItemEvent: function() {
            var value = $("#personal").getSelectedItemData().cod_personal;
            $("#codper").val(value).trigger("change");
          },
          match: {
            enabled: true
          }
        }
      };
      $("#personal").easyAutocomplete(options);
    });
    $.getJSON("../php/operacion.php", {evento: "mostrarServ"}, function(respuesta){
      var options = {
        data: respuesta,
        getValue: "nombre_servicio",
        list: {
          onSelectItemEvent: function() {
            var value = $("#producto").getSelectedItemData().cod_servicio;
            $("#codpro").val(value).trigger("change");
          },
          match: {
            enabled: true
          }
        }
      };
      $("#producto").easyAutocomplete(options);
    });
    var total=0;
    $('#agregar').on('click',function(e){
      e.preventDefault();
      var nombre=$('#producto').val();
      var codigo=$('#codpro').val();
      swal({
        title: 'Costo del Servicio Bs.',
        input: 'text',
        showCancelButton: true,
        inputValidator: function (value) {
          return new Promise(function (resolve, reject) {
            if (value) {
              resolve()
            } else {
              reject('Tienes que Escribir un Costo!')
            }
          })
        }
      }).then(function (result) {
        swal({
          type: 'success',
          html: nombre+' Costo: Bs. ' + result
        });
        $(".contenedor").append('<tr><td style="display:none;">'+codigo+'</td><td>'+nombre+'</td><td>'+result+'</td></tr>');
        total=total+parseInt(result);
        $('#total').attr('value',total);
      })
    });
    $('#anularVenta').on('click',function(e){
      e.preventDefault();
      var fecha=$('#mCodigo').text();
      var codigo=$('#mFecha').text();
      var r = confirm("Desea Anular El Servicio!");
      if (r == true) {
          $.ajax({
              url:'../php/registros.php',
              type:'post',
              data: "valor=anularTabservicios&fecha="+fecha+"&codcli="+codigo+"",
              beforeSend:function(){
                  $('.faocu').css('display','inline')
              },
              success: function(resp){
                  console.log(resp);
                  if (resp) {
                    resp="correctamente";
                  }
                  alert(
                    'Producto Eliminado '+resp
                  );
                  window.location.href = "servicios.php";
              },
              error:function(jqXHR,estado,error){
                  alert("error "+error);
                  console.log(error)
              },
              complete:function(jqXHR,estado){
                  $('#registrar').hide();
                  $('#nuevo1').show();
                  $('#editar').hide();
                  $('#eliminar').hide();
              }
          });
      } else {
          console.log("You pressed Cancel!");
      }
    });

    $('#nfactura').on('click',function(e){
        e.preventDefault();
        var cli=$('#cliente').val();
        var tot=$('#total').val();
        location.href ="factura2.php?nombre="+cli+"&to="+tot;
        //alert(cli);
    });

    $.getJSON("../php/operacion.php", {evento: "Seguimiento"}, function(res){
      var i;
      var estado="";
      for (i=0 ; i<=res.length-1; i++) {
        if(res[i].fechafi=='0000-00-00'){
          estado="EN PROCESO";
          $(".contenedor7").append('<tr style="background:#FADBD8;"><td class="mdl-data-table__cell--non-numeric">'+res[i].id+'</td><td>'+res[i].fecha_servicio+'</td><td>'+res[i].fechafi+'</td><td>'+res[i].nombre_cliente+'</td><td>'+res[i].nombre_servicio+'</td><td><a onclick="funcion7(\''+res[i].id+'\',\''+res[i].nombre_servicio+'\',\''+res[i].nombre_cliente+'\')" href="#modal7" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></a></td><td>'+estado+'</td></tr>');
        }else{
          estado="FINALIZADO";
          $(".contenedor7").append('<tr style="background:#D5F5E3;"><td class="mdl-data-table__cell--non-numeric">'+res[i].id+'</td><td>'+res[i].fecha_servicio+'</td><td>'+res[i].fechafi+'</td><td>'+res[i].nombre_cliente+'</td><td>'+res[i].nombre_servicio+'</td><td><a onclick="funcion8(\''+res[i].id+'\',\''+res[i].nombre_servicio+'\',\''+res[i].nombre_cliente+'\')" href="#modal8" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></a></td><td>'+estado+'</td></tr>');
        }
        
      }
    });

    $('#terseg').on('click',function(e){
      e.preventDefault();
      var ids=$('#mFecha7').text();
      
        $.ajax({
            url:'../php/registros.php',
            type:'post',
            data: "valor=terminar"+"&ide="+ids,
            beforeSend:function(){
                $('.faocu').css('display','inline')
            },
            success: function(resp){
                if(resp>0){
                  alert("Servicio Finalizo.");
                }
            },
            error:function(jqXHR,estado,error){
                console.log(error)
            },
            complete:function(jqXHR,estado){
                $('#terseg').hide();
                $('#desa').hide();
            }
        });

    });
    
});
  function funcion(fecha,nombre,nombre2,cod){
    //console.log(fecha,nombre);
    $('#modal1Title').html(nombre2);
    $('#mCodigo').html(fecha);
    $('#mFecha').html(nombre);

    var total=0;
    $.getJSON("../php/operacion.php", {evento: "showServicios",cod:cod}, function(respuesta){
      var i;  
      $('.contenedor31').empty();
      for (i=0 ; i<=respuesta.length-1; i++) {
        total=total+parseInt(respuesta[i].costo_servicio);
        $(".contenedor31").append('<tr><td>'+respuesta[i].nombre_servicio+'</td><td>'+respuesta[i].costo_servicio+'</td></tr>');
      }
      $('#message2').html("Total: "+total);
    });
  }

  function funcion7(id,servicio,cliente){
    $('#modal2titulo').html(cliente);
    $('#se-g').html(servicio);
    $('#mFecha7').html(id);
    cargarseg(id);
  }
  function funcion8(id,servicio,cliente){
    $('#modal8titulo').html(cliente);
    $('#se-g8').html(servicio);
    $('#mFecha8').html(id);
    cargarseg(id);
  }

  function cargarseg(ide){
    $.getJSON("../php/operacion.php", {evento: "showSeg",cod:ide}, function(respuesta){
      var i;  
      $('.contenedor37').empty();
      for (i=0 ; i<=respuesta.length-1; i++) {
        total=total+parseInt(respuesta[i].costo_servicio);
        $(".contenedor37").append('<tr><td>'+respuesta[i].fecha+'</td><td>'+respuesta[i].notas+'</td></tr>');
      }
    });
  }