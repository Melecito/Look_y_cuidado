/*===================================
CARGAR LA TABLA DINAMICA DE PRODUCTOS
====================================*/

// $.ajax({

// 	url: "ajax/datatable-productos.ajax.php",
// 	success:function(respuesta){

// 		console.log("respuesta", respuesta);

// 	}


// })



 $('.tablaProductos').DataTable({
    "ajax": 'ajax/datatable-productos.ajax.php',
    "bDeferRender": true,
    "retrieve": true,
    "progressing": true,
    "language":{
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningun dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrando de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":  "Primero",
            "sLast":   "Último",
            "sNext":   "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending":  ": Activar para ordenar la columna de manera descendente",
        }
    }
})

 $("#nuevaCategoria").change(function(){

 	var idCategoria = $(this).val();

 	var datos = new FormData();
 	datos.append("idCategoria", idCategoria);

 	$.ajax({

        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){


            
           // var nuevoCodigo = respuesta["Codigo"];
        	console.log("respuesta");

        }


    });



 })
