$(document).ready(function(){

  $("#nom_sucursal").select2();
  $("#mes").select2();
  $("#anio").select2();

  $("#btn_ver").click(function(e){
    e.preventDefault();

    if($("#nom_sucursal").val() == ""){
      return;
    }

    $("#facturas").parents("div.box-body").remove();

    var url = "/home/datos_factura";

    var token = $("#token").val();
    var id_sucursal = $("#nom_sucursal").val();
      
    var data = $("#ver_facturas").serialize();

    console.log(data);


    $.ajax({
            url:"./datos_factura/" + id_sucursal,
            headers: {'X-CSRF-TOKEN': token},
            type:"POST",
            dataType: 'json',
            data: data,        
    })
    .done(function(response){
      $(".box").append(response);
      console.log(response);

    })
    .fail(function(response){
      $(".box").append(response.responseText);
      console.log(response);
    });
  });     




});
