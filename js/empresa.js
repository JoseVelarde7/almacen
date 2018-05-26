$(document).ready(function(){
    $('#nuevo1').hide();
    $.getJSON("../php/operacion.php", {evento: "mostrarEmpresa"}, function(respuesta){
      $('#empresa_nombre').html(respuesta[0]['empresa_nombre']);
      $('#direccion').html(respuesta[0]['empresa_direccion']);
      $('#telefono').html(respuesta[0]['empresa_telefono']);
      $('#propietario').html(respuesta[0]['empresa_propietario']);
      $('#celular').html(respuesta[0]['empresa_celular']);
      $('#nit').html(respuesta[0]['empresa_nit']);
      $('#razon').html(respuesta[0]['empresa_nomnit']);
      $('#obs').html(respuesta[0]['empresa_obs']);


      $('#n_nombre').attr('value',respuesta[0]['empresa_nombre']);
      $('#n_direccion').attr('value',respuesta[0]['empresa_direccion']);
      $('#n_telefono').attr('value',respuesta[0]['empresa_telefono']);
      $('#representante').attr('value',respuesta[0]['empresa_propietario']);
      $('#n_celular').attr('value',respuesta[0]['empresa_celular']);
      $('#n_nit').attr('value',respuesta[0]['empresa_nit']);
      $('#n_razon').attr('value',respuesta[0]['empresa_nomnit']);
      $('#notas').attr('value',respuesta[0]['empresa_obs']);
      $('#ide1').attr('value',respuesta[0]['id']);

    });

    $('#modempresa').on('click',function(e){
      e.preventDefault();
        var dat=$('#moduser').serialize();
        $.ajax({
            url:'../php/registros.php',
            type:'post',
            data: "valor=modificarEmpresa"+"&"+dat,
            beforeSend:function(){
                $('.faocu').css('display','inline')
            },
            success: function(resp){
                swal(
                  'Registro Modificado',
                  'Se Modifico el Registro Nro. '+resp,
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
              
            }
        });
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