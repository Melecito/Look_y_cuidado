/************************
 * Eliminar usuario      *
 * **********************/

$(".btnEliminarCita").click(function()
{    

   swal({
        title: '¿Estás seguro de borrar la cita?',
        text: "¡Si no lo está cancelar la accion!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, borrar cita!'
    }).then((result)=>{

        if (result.value) {

           window.location = "index.php?ruta=citas$idCita="+idCita;

        }
    })
})
