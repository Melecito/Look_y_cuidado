/*==========================================
Cargar la tabla dinamica de ventas
==========================================*/

// $.ajax({

// 	url: "ajax/datatable-ventas.ajax.php",
// 	success:function(respuesta){

// 		console.log("respuesta", respuesta);

// 	}


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
	console.log("idProducto", idProducto);

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

          		$(".nuevoProducto").append(

          		'<div class="row" style="padding:5px 15px">'+

          			'<!-- Descripcion del producto -->'+

                  '<div class="col-xs-6" style="padding-right: 0px">'+

                    '<div class="input-group">'+

                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

                      '<input type="text" class="form-control" name="agregarProducto" id="agregarProducto" value="'+descripcion+'" readonly required>'+
                      
                    '</div>'+                  

                  '</div>'+

                  '<!-- Cantidad del producto -->'+

                  '<div class="col-xs-3">'+

                    '<input type="number" class="form-control" name="nuevaCantidadProducto" id="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" required>'+
                    

                  '</div>'+

                  '<!-- Precio del producto -->'+

                   '<div class="col-xs-3" style="padding-left: 0px">'+

                    '<div class="input-group">'+

                      '<span class="input-group-addon">'+

                      '<i class="ion ion-social-usd"></i></span>'+

                      '<input type="number" class="form-control" name="nuevoPrecioProducto" id="nuevoPrecioProducto" min="1" value="'+precio+'" readonly required>'+

                    
                    '</div>'+                   

                  '</div>'+

                 '</div>')
          		}    	      


          });


});

/*===========================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTON
============================================*/

$(".formularioVenta").on("click", "button.quitarProducto", function(){	

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-defult');
	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

});