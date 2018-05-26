$(document).ready(function(){
    $.getJSON("../php/operacion.php", {evento: "mostrarInventario"}, function(respuesta){
      var i;
      for (i=0 ; i<=respuesta.length-1; i++) {
        $(".contenedor").append('<tr class="tab"><td class="mdl-data-table__cell--non-numeric">'+respuesta[i].producto_productos+'</td><td>'+respuesta[i].id+'</td><td>'+respuesta[i].cantidad+'</td><td>Bs'+respuesta[i].precio+'</td></tr>');
      }
    });
    $("#searchInventario" ).keyup(function() {
      var rex = new RegExp($(this).val(), 'i');
      $('.tab ').hide();
      $('.tab ').filter(function () {
          return rex.test($(this).text());
      }).show();
    });
    $.getJSON("../php/operacion.php", {evento: "noti"}, function(respuesta){
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

    $.getJSON("../php/operacion.php", {evento: "mostrarProductos"}, function(respuesta){
      var options = {
        data: respuesta,
        getValue: "producto_productos",
        list: {
          onSelectItemEvent: function() {
            var value = $("#producto2").getSelectedItemData().cod_producto;
            $("#codpro2").val(value).trigger("change");
          },
          match: {
            enabled: true
          }
        }
      };
      $("#producto2").easyAutocomplete(options);
    });

    $('#generar').on('click',function(e){
      e.preventDefault();
      var pro=$('#producto').val();
      $.getJSON("../php/operacion.php", {evento: "showbalance",nombre:pro}, function(resp){
        var i;
        var balance=0;
        for (i=0 ; i<=resp.length-1; i++) {
          if (resp[i].estado=='entrada') {
            balance=balance+parseInt(resp[i].cantidad_descargo);
          }else{
            balance=balance-parseInt(resp[i].cantidad_descargo);
          }
          $(".cont").append('<tr><td>'+resp[i].fecha_venta+'</td><td>'+resp[i].nombre_cliente+'</td><td>'+resp[i].estado+'</td><td>'+resp[i].cantidad_descargo+'</td><td>'+balance+'</td></tr>');
        }
      });

    });

    $('#generar2').on('click',function(e){
      e.preventDefault();
      var pro=$('#producto2').val();
      $('.cont2').empty();
      $.getJSON("../php/operacion.php", {evento: "showbalance2",nombre:pro}, function(resp){
        var i;
        var balance=0;
        var precio=0;
        var totals=0;
        for (i=0 ; i<=resp.length-1; i++) {
          if (resp[i].estado=='entrada') {
            balance=balance+parseInt(resp[i].cantidad_descargo);
            totals=(parseInt(resp[i].precio_producto)*parseInt(resp[i].cantidad_descargo));
            precio=precio+(parseFloat(resp[i].precio_producto)*parseFloat(resp[i].cantidad_descargo));
            $(".cont2").append('<tr><td>'+resp[i].fecha_venta+'</td><td>'+resp[i].cantidad_descargo+'</td><td>'+resp[i].precio_producto+'</td><td>'+totals+'</td><td></td><td></td><td></td><td>'+balance+'</td><td>'+(precio/balance)+'</td><td>'+precio+'</td></tr>');
          }else{
            balance=balance-parseInt(resp[i].cantidad_descargo);
            precio=precio-(parseFloat(resp[i].precio_producto)*parseFloat(resp[i].cantidad_descargo));
            $(".cont2").append('<tr><td>'+resp[i].fecha_venta+'</td><td></td><td></td><td></td><td>'+resp[i].cantidad_descargo+'</td><td>'+resp[i].precio_producto+'</td><td>'+totals+'</td><td>'+balance+'</td><td>'+(precio/balance)+'</td><td>'+precio+'</td></tr>');
          }
        }
      });
    }); 
});