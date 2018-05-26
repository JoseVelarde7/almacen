$(document).ready(function(){
    $('#nuevo1').hide();
    $('#nfactura').hide();

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

    $.getJSON("../php/operacion.php", {evento: "mostrarVentas"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".contenedor21").append('<tr><td class="mdl-data-table__cell--non-numeric">'+respuesta[i].fecha_venta+'</td><td>'+respuesta[i].nombre_cliente+'</td><td>'+respuesta[i].total_venta+'</td><td>'+respuesta[i].notas_venta+'</td><td><a onclick="funcion(\''+respuesta[i].cod_venta+'\',\''+respuesta[i].nombre_cliente+'\',\''+respuesta[i].total_venta+'\')" href="#modal2" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></a></td></tr>');
      }
    });
    $.getJSON("../php/operacion.php", {evento: "mostrarInvoice"}, function(respuesta){
      //console.log(respuesta);
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".contenedor25").append('<tr><td class="mdl-data-table__cell--non-numeric">'+respuesta[i].factura+'</td><td>'+respuesta[i].fecha+'</td><td>'+respuesta[i].nombre+'</td><td>'+respuesta[i].nit+'</td><td>'+respuesta[i].total+'</td><td><a href="invoice.php?factura='+respuesta[i].factura+'&fecha='+respuesta[i].fecha+'&nombre='+respuesta[i].nombre+'&nit='+respuesta[i].nit+'&total='+respuesta[i].total+'&codigo='+respuesta[i].codventa+'" target="_blank" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></a></td></tr>');
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

        var nombre1=$('#cliente').val();
        var descripcion1=$('#personal').val();
        if (nombre1=="" || descripcion1=="") {
          swal(
            'Los Siguientes Campos Son Requeridos',
            '*cliente *usuario',
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
                    data: "valor=registrarVenta"+"&"+datos+"&tabla="+presentaciones,
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
                        $('#nfactura').show();
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
    $.getJSON("../php/operacion.php", {evento: "mostrarProductos"}, function(respuesta){
      var options = {
        data: respuesta,
        getValue: "producto_productos",
        list: {
          onSelectItemEvent: function() {
            var value = $("#producto").getSelectedItemData().cod_producto;
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
      $.getJSON("../php/operacion.php", {evento: "datproducto",nom:nombre}, function(respuesta){
        swal({
          title: ''+nombre,
          html:
            'Cantidad '+respuesta[0].cantidad+': <input id="swal-input1" class="swal2-input">' +
            'Precio en Bolivianos: <input id="swal-input2" class="swal2-input" value="'+respuesta[0].precio_productos+'">',
          preConfirm: function () {
            return new Promise(function (resolve) {
              resolve([
                $('#swal-input1').val(),
                $('#swal-input2').val()
              ])
            })
          },
          onOpen: function () {
            $('#swal-input1').focus()
          }
        }).then(function (result) {
          if(parseInt(respuesta[0].cantidad)<parseInt(result[0])){
            result[0]=respuesta[0].cantidad;
          }
          $(".contenedor").append('<tr><td style="display:none;">'+codigo+'</td><td>'+nombre+'</td><td>'+result[0]+'</td><td>'+result[1]+'</td><td>'+(result[0])*(result[1])+'</td></tr>');
          total=total+((result[0])*(result[1]));
          $('#total').attr('value',total);
        }).catch(swal.noop)

      });
    });
    $('#anularVenta').on('click',function(e){
      e.preventDefault();
      var codigo=$('#mCodigo').text();
      var r = confirm("Desea Anular la Venta!");
      if (r == true) {
          $.ajax({
              url:'../php/registros.php',
              type:'post',
              data: "valor=anularVenta&ide="+codigo+"",
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
                  window.location.href = "sales.php";
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
    $('#imprimir').on('click',function(e){
      e.preventDefault();
      var cod=$('#mCodigo').text();
      var url="../php/reportes/transSales1.php?io="+cod;
      //window.location=(url);

      window.open(url, '_blank');
      return false;
    });
    $('#nfactura').on('click',function(e){
        e.preventDefault();
        var cli=$('#cliente').val();
        var tot=$('#total').val();
        location.href ="factura.php?nombre="+cli+"&to="+tot;
        //alert(cli);
    });
    $('#vxdia').on('click',function(e){
      e.preventDefault();
      var dia=$('#xdia').val();
      window.open('../php/reportes/transdia.php?dia='+dia, '_blank');
    });

    $('#vxperiodo').on('click',function(e){
      e.preventDefault();
      var ini=$('#ini').val();
      var fn=$('#has').val();
      window.open('../php/reportes/transperiodo.php?ini='+ini+'&fn='+fn, '_blank');
    });

})
  
function funcion(codigo,nombre,total){
  $('#modal1Title').html(nombre);
  $('#message2').html("Total: "+total);
  $('#mCodigo').html(codigo);
  $.getJSON("../php/operacion.php", {evento: "mostrarVen",cod:codigo}, function(respuesta){
    var i;
    $('.contenedor31').empty();
    for (i=0 ; i<=respuesta.length-1; i++) {
      $(".contenedor31").append('<tr><td>'+respuesta[i].item_descargo+'</td><td>'+respuesta[i].cantidad_descargo+'</td><td>'+respuesta[i].precio_producto+'</td><td>'+respuesta[i].total_descargo+'</td></td>');
    }
  });
}