/*==========================================
Cargar la tabla dinamica de ventas
==========================================*/

// $.ajax({

//   url: "ajax/datatable-ventas.ajax.php",
//   success:function(respuesta){

//     // console.log("respuesta", respuesta);

//   }


// })

$('.tablaVentas').DataTable( {
    "ajax": "ajax/datatable-ventas.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
     "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

    }

} );

/*===========================================
AGREGANDO PRODUCTOS A LA VENTA DE LA TABLA
============================================*/

$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

  var idProducto = $(this).attr("idProducto");
  // console.log("idProducto", idProducto);

  $(this).removeClass('btn-primary agregarProducto');

  $(this).addClass('btn-default');

  var datos = new FormData();
  datos.append("idProducto", idProducto);


  $.ajax({

      url:"ajax/productos.ajax.php",
        method:"POST",
          data:datos,
          cache:false,
          contentType:false,
          processData:false,
          dataType:"json",
          success:function(respuesta){

              var descripcion = respuesta["Descripcion"];
              var stock = respuesta["Stock"];
              var precio = respuesta["PrecioVenta"];

              /*=============================================
            EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
            =============================================*/

              if(stock == 0){

                swal({
                  title: "No hay stock disponible",
                  type: "error",
                  confirmButtonText: "¡Cerrar!"
                });

                $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

                return;

              }

              $(".nuevoProducto").append(

              '<div class="row" style="padding:5px 15px">'+

                '<!-- Descripcion del producto -->'+

                  '<div class="col-xs-6" style="padding-right: 0px">'+

                    '<div class="input-group">'+

                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

                      '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+
                      
                    '</div>'+                  

                  '</div>'+

                  '<!-- Cantidad del producto -->'+

                  '<div class="col-xs-3">'+

                    '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+
                    
 
                  '</div>'+

                  '<!-- Precio del producto -->'+

                   '<div class="col-xs-3 ingresoPrecio" style="padding-left: 0px">'+

                    '<div class="input-group">'+

                      '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

                      '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+

                    
                    '</div>'+                   

                  '</div>'+

                 '</div>'

                 )

              //SUMAR TOTAL DE PRECIOS
              sumarTotalPrecios();

              // AGREGAR IMPUESTO

              agregarImpuesto();

              //AGRUPAR PRODUCTOS EN JSON

              listarPorductos();

              //PONER FORMATO AL PRECIO DE LOS PRODUCTOS

              $(".nuevoPrecioProducto").number(true, 2);

             
            
              }            


          })


});

  /*===========================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGE EN ELLA
============================================*/

$(".tablaVentas").on("draw.dt", function(){

    if(localStorage.getItem("quitarProducto") != null){

      var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

      for(var i = 0; i < listaIdProductos.length; i++){

        $("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-defult');
        $("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

      }

    }

})

/*===========================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTON
============================================*/
var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function(){  

  $(this).parent().parent().parent().parent().remove();

  var idProducto = $(this).attr("idProducto"); 



  /*===========================================
ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
============================================*/

if(localStorage.getItem("quitarProducto") == null){

    idQuitarProducto = [];

}else{

    idQuitarProducto.concat(localStorage.getItem("quitarProducto"));


}

idQuitarProducto.push({"idProducto":idProducto});

localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

  $("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-defult');

  $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');


  if($(".nuevoProducto").children().length == 0){

      $("#nuevoTotalVenta").val(0);
      $("#nuevoImpuestoVenta").val(0);
      $("#totalVenta").val(0);
      $("#nuevoTotalVenta").attr("total",0);
      //$('#nuevoTotalVenta').val(0);


  }else{


    // SUMAR TOTAL DE PRECIOS

      sumarTotalPrecios();

      // AGREGAR IMPUESTO
          
        agregarImpuesto();


        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos();
  }
  

   

})


/*===========================================
AGREGANDO PRODUCTOS DESDE EL BOTON PARA DISPOSITIVOS
============================================*/
var numProducto = 0;

$(".btnAgregarProducto").click(function(){

  numProducto ++;

  var datos = new FormData();
  datos.append("traerProductos", "ok");

  $.ajax({

          url:"ajax/productos.ajax.php",
          method:"POST",
          data:datos,
          cache:false,
          contentType:false,
          processData:false,
          dataType:"json",
          success:function(respuesta){

            $(".nuevoProducto").append(

              '<div class="row" style="padding:5px 15px">'+

                '<!-- Descripcion del producto -->'+

                  '<div class="col-xs-6" style="padding-right: 0px">'+

                    '<div class="input-group">'+

                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+

                      '<select class="form-control nuevaDescripcionProducto agregarProducto" id="producto'+numProducto+'" idProducto name="nuevaDescripcionProducto" required>'+

                      '<option value"seleccioneProducto">Seleccione el producto</option>'+

                      '</select>'+
                      
                    '</div>'+                  

                  '</div>'+

                  '<!-- Cantidad del producto -->'+

                  '<div class="col-xs-3 ingresoCantidad">'+

                    '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock nuevoStock required>'+
                    

                  '</div>'+

                  '<!-- Precio del producto -->'+

                   '<div class="col-xs-3 ingresoPrecio" style="padding-left: 0px">'+

                    '<div class="input-group">'+

                      '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

                      '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" value readonly required>'+

                    
                    '</div>'+                   

                  '</div>'+

                 '</div>');

                  // AGREGAR LOS PRODUCTOS AL SELECT

                  respuesta.forEach(funcionForEach);

                  function funcionForEach(item, index){

                      if(item.Stock != 0){
                      

                      $("#producto"+numProducto).append(

                          '<option idProducto="'+item.IdProduc+'"value="'+item.Descripcion+'">'+item.Descripcion+'</option>'

                      )

                      
                    

                    }

                                      

                  }  

                  // SUMAR TOTAL DE PRECIOS
                   sumarTotalPrecios(); 

                   agregarImpuesto();

                  

                   //PONER FORMATO AL PRECIO DE LOS PRODUCTOS

                   $(".nuevoPrecioProducto").number(true, 2);                  

                  
             }

      })


})

/*===========================================
SELECCIONAR PRODUCTO
============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){


  var nombreProducto = $(this).val();

  var nuevaDescripcionProducto = $(this).parent().parent().parent().children().children().children(".nuevaDescripcionProducto");
  var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
  var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");


  var datos = new FormData();
  datos.append("nombreProducto", nombreProducto);
    // console.log("nombreProducto", nombreProducto);

      $.ajax({

          url:"ajax/productos.ajax.php",
          method:"POST",
          data:datos,
          cache:false,
          contentType:false,
          processData:false,
          dataType:"json",
          success:function(respuesta){

              $(nuevaDescripcionProducto).attr("idProducto", respuesta["IdProduc"]);
              $(nuevaCantidadProducto).attr("stock", respuesta["Stock"]);
              $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["Stock"])-1);
              $(nuevoPrecioProducto).val(respuesta["PrecioVenta"]);
              $(nuevoPrecioProducto).attr("precioReal",respuesta["PrecioVenta"]);
              sumarTotalPrecios();

             //AGRUPAR PRODUCTOS EN JSON

             listarPorductos();

          }
        })

})

/*===========================================
MODIFICAR CANTIDAD DE PRODUCTOS
============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

  var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
  //console.log("precio", precio.val());

  var precioFinal = $(this).val() * precio.attr("precioReal");  

  precio.val(precioFinal);

  var nuevoStock  = Number($(this).attr("stock")) - $(this).val();

  $(this).attr("nuevoStock", nuevoStock);

  if(Number($(this).val()) > Number($(this).attr("stock"))){

    /*===========================================
    SI LA CANTIDAD  ES SUPERIOR AL STOCK REGRESAR VALORES INICIALES
    ============================================*/

      $(this).val(1);

      var precioFinal = $(this).val() * precio.attr("precioReal");

      precio.val(precioFinal);

      sumarTotalPrecios(); 

      agregarImpuesto();

      //AGRUPAR PRODUCTOS EN JSON

      listarPorductos();

      //PONER FORMATO AL PRECIO DE LOS PRODUCTOS

      //$(".nuevoPrecioProducto").number(true, 2);

      swal({
          title: "La cantidad supera al stock",
          text: "¡Sólo hay "+$(this).attr("stock")+" unidades!", 
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

      return;

  }

  //SUMAR TOTAL DE PRECIOS

  sumarTotalPrecios();

  agregarImpuesto();

  //AGRUPAR PRODUCTOS EN JSON

  listarPorductos();

  

  //PONER FORMATO AL PRECIO DE LOS PRODUCTOS

  //$(".nuevoPrecioProducto").number(true, 2);



})


/*===========================================
SUMAR TODOS LOS PRECIOS
============================================*/

function sumarTotalPrecios(){

  var precioItem = $(".nuevoPrecioProducto");
  var arraySumaPrecio = [];

  for(var i = 0; i < precioItem.length; i++){

    arraySumaPrecio.push(Number($(precioItem[i]).val()));


  }

  function sumaArrayPrecios(total, numero){

      return total + numero;


  }

  var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);

  $("#nuevoTotalVenta").val(sumaTotalPrecio);
  $("#totalVenta").val(sumaTotalPrecio);  
  $("#nuevoTotalVenta").attr("total",sumaTotalPrecio);

  



}

/*===========================================
AGREGAR IMPUESTO
============================================*/

function agregarImpuesto(){


    var impuesto = $("#nuevoImpuestoVenta").val();

    var precioTotal = $("#nuevoTotalVenta").attr("total");

    var precioImpuesto = Number(precioTotal * impuesto/100);

    var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);

    $("#nuevoTotalVenta").val(totalConImpuesto);

    $("#totalVenta").val(totalConImpuesto);

    $("#nuevoPrecioImpuesto").val(precioImpuesto);

    $("#nuevoPrecioNeto").val(precioTotal);


}

/*===========================================
CUANDO CAMBIA EL IMPUESTO
============================================*/

$("#nuevoImpuestoVenta").change(function(){


    agregarImpuesto();


})

//PONER FORMATO AL PRECIO FINAL

$("#nuevoTotalVenta").number(true, 2);


/*===========================================
SELECCIONAR METODO DE PAGO
============================================*/

$("#nuevoMetodoPago").change(function(){

  var metodo = $(this).val();

  if(metodo == "Efectivo"){

    $(this).parent().parent().removeClass("col-xs-6");

    $(this).parent().parent().addClass("col-xs-4");

    $(this).parent().parent().parent().children(".cajasMetodoPago").html(
      

      '<div class="col-xs-4">'+

        '<div class="input-group">'+

          '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

          '<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>'+

        '</div>'+

      '</div>'+

      '<div class="col-xs-4 capturarCambioEfectivo" style="padding-left:0px">'+

        '<div class="input-group">'+

          '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

          '<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+

      '</div>'

      )

    $("#nuevoValorEfectivo").number(true, 2);
    $("#nuevoCambioEfectivo").number(true, 2);


    // Listar metodo en la entrada
    listarMetodoPago();
    

  }else{


    $(this).parent().parent().removeClass('col-xs-4');

    $(this).parent().parent().addClass('col-xs-6');

    $(this).parent().parent().parent().children('.cajasMetodoPago').html(


      '<div class="col-xs-6" style="padding-left:0px">'+

          '<div class="input-group">'+

            '<input type="text" class="form-control" name="nuevoCodigoTransaccion" id="nuevoCodigoTransaccion" placeholder="Código transacción" required>'+

            '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+

          '</div>'+

       '</div>'

      )

  }

})
 
9
/*=============================================
CAMBIO EN EFECTIVO
=============================================*/
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

  var efectivo = $(this).val();

  if(efectivo >= $('#nuevoTotalVenta').val()){

    var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

  }else{

    swal({
          title: "Efectivo insuficiente para la transaccion",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });
  }

  

  var nuevoCambioEfectivo = $(this).parent().parent().parent().children('.capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

  nuevoCambioEfectivo.val(cambio);

})

/*=============================================
CAMBIO TRANSACCION
=============================================*/
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){

  listarMetodoPago();  

})


/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarPorductos(){

  var listaPorductos = [];

  var descripcion = $(".nuevaDescripcionProducto");

  var cantidad = $(".nuevaCantidadProducto");

  var precio = $(".nuevoPrecioProducto"); 

  for(var i = 0; i < descripcion.length; i++){


    listaPorductos.push({"IdProduc" : $(descripcion[i]).attr("idProducto"),
                         "Descripcion" : $(descripcion[i]).val(),
                         "Cantidad" : $(cantidad[i]).val(),
                         "Stock" : $(cantidad[i]).attr("nuevoStock"),
                         "precio" : $(precio[i]).attr("precioReal"),
                         "total" : $(precio[i]).val()})


  }

  //console.log("listaPorductos", JSON.stringify(listaPorductos));  

  $("#listaProductos").val(JSON.stringify(listaPorductos));


}

/*=============================================
LISTAR METODO DE PAGO
=============================================*/

function listarMetodoPago(){

  var listaMetodo = "";

  if($("#nuevoMetodoPago").val() == "Efectivo"){

    $("#listaMetodoPago").val("Efectivo");

  }else{

    $("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());

  }
}




