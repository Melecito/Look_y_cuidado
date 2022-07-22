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
});

 $("#nuevaCategoria").change(function(){

 	var idCategoria = $(this).val();

 	var datos = new FormData();
 	datos.append("idCategoria", idCategoria);

 	$.ajax({

        url:"ajax/productos.ajax.php",
        method:"POST",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){


            if (!respuesta) {

                 var nuevoCodigo = idCategoria+"01";
                  $("#nuevoCodigo").val(nuevoCodigo);

            }else{

                var nuevoCodigo = Number(respuesta["Codigo"])+1;
                 $("#nuevoCodigo").val(nuevoCodigo);


            }            
           
        }

    })


 })

/*===================================
AGREGANDO PRECIO DE VENTA
====================================*/

$("#nuevoPrecioCompra").change(function(){

    if ($(".porcentaje").prop("checked")) {

        var valorPorcentaje = $(".nuevoPorcentaje").val();
        
        var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number(($("#nuevoPrecioCompra").val()));
        // console.log("porcentaje", porcentaje);

        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly", true);
    }  


})

/*===================================
CAMBIO DE PORCENTAJE
====================================*/

$(".nuevoPorcentaje").change(function(){

    if ($(".porcentaje").prop("checked")) {

        var valorPorcentaje = $(".nuevoPorcentaje").val();
        
        var porcentaje = Number(($("#nuevoPrecioCompra").val()
            *valorPorcentaje/100))+Number(($("#nuevoPrecioCompra")
            .val()));
        
        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly",true);
    }  

})

$(".porcentaje").on("ifUnchecked",function(){

     $("#nuevoPrecioVenta").prop("readonly", false);

})

$(".porcentaje").on("ifchecked",function(){

     $("#nuevoPrecioVenta").prop("readonly",true);

})


/************************
 * Subiendo foto producto*
 * **********************/

 $(".nuevaImagen").change(function(){

    var imagen = this.files[0];


    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaImagen").val("");
        

        swal({

            title: "Error al subir la imagen",
            text:  "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
            });

    }else if(imagen["size"] > 2000000){

        $(".nuevaImagen").val("");

        swal({

            title: "Error al subir la imagen",
            text:  "¡La imagen no debe pesar mas de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
            });

    }else{

        var datosImagen = new FileReader;

        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);
        })
    }
 }) 


   

