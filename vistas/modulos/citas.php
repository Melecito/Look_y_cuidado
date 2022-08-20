<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <h1>
        Administrar citas

       
      </h1>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar citas</li>
      </ol>

    </section>

   
    <section class="content">

     
      <div class="box">
        <div class="box-header with-border">    

          <button class="btn btn-primary" 
          data-toggle="modal"
          data-target="#modalAgregarUsuario">
            Agendar cita
          </button>    

          
        </div>

        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive-responsive tablas">
            
            <thead>
              
              <tr>
                
                <th>#</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Nombre Mascota</th>
                <th>Consultorio</th>
                <th>Medico</th>
                <th>Acciones</th>




              </tr>


            </thead>

           <tbody>

              <tr>

                <td>1</td>
                <td>Julio Perez</td>
                <td>2022-08-16 </td>
                <td>11:59:06</td>
                <td>Mateo</td>
                <td>101</td>
                <td>Carolina Rios</td>

                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning btnEditarUsuario" data-toggle="modal" data-target="#modalEditarCita"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarCita" idCita="idCita"><i class="fa fa-times"></i></button>
                    
                  </div>

                  </td>


                </td>
                
              </tr>

               <tr>

                <td>2</td>
                <td>Claudia Melo</td>
                <td>2022-08-16 </td>
                <td>12:30:06</td>
                <td>Luky</td>
                <td>101</td>
                <td>Carolina Rios</td>

                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning btnEditarUsuario" data-toggle="modal" data-target="#modalEditarCita"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarCita" idCita="idCita"><i class="fa fa-times"></i></button>
                    
                  </div>

                  </td>


                </td>
                
              </tr>

               <tr>

                <td>3</td>
                <td>Liliana Diaz</td>
                <td>2022-08-16 </td>
                <td>11:59:06</td>
                <td>Tomy</td>
                <td>102</td>
                <td>Pedro Campos</td>

                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning btnEditarUsuario" data-toggle="modal" data-target="#modalEditarCita"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btnEliminarCita" idCita="idCita"><i class="fa fa-times"></i></button>
                 
                  </div>

                  </td>


                </td>
                
              </tr>

            </tbody>
            
          </table>


        </div>
      
      </div>


      <!-- /.box -->

    </section>

    <!-- /.content -->
  </div>


  
  <!--  MODAL AGREGAR USUARIO -->
  

  <!-- The Modal -->
  <div class="modal" id="modalAgregarUsuario">
    
    <div class="modal-dialog">
      
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--   CABEZA MODAL  -->

          <div class="modal-header" style="background: #3c8dbc; color: white;">

            <h4 class="modal-title">Agendar cita</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

           <!-- CUERPO MODAL -->
          
          <div class="modal-body">

            <div class="box-body">

               <!-- AGREGAR NOMBRE-->
              
              <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevonombre" placeholder="Ingresar nombre" required>
                  
                </div>
              </div>

              <!-- AGREGAR NOMBRE MASCOTA-->

              <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-paw"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaNombreMascota" placeholder="Ingresar nombre de la mascota"  required>
                  
                 </div>  
                </div> 

                
                                
                  <!--AGREGAR FECHA-->
                

                

                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="date" class="form-control input-lg" name="nuevaFecha" placeholder="Ingresar fecha" required>
                  
                </div>
              </div>             
                              
                  <!--AGREGAR HORA-->          

                

                    <div class="form-group">
                    <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="time" class="form-control input-lg" name="nuevaHora" placeholder="Ingresar hora" required>
                    
                  </div>
                </div> 

                 <!--AGREGAR MEDICO-->

                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaMedico" placeholder="Ingresar Medico"  required>
                  
                 </div>  
                </div> 

                <!-- AGREGAR CONSULTORIO--> 
                           
                 <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-hospital-o"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaFecha" placeholder="Ingresar consultorio"  required>
                  
                 </div>  
                </div> 


                    
                  </div>
                </div>

                 
          
          <!-- PIE MODAL -->
          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar cita</button>

          </div>
      </form>

      </div>
    </div>
  </div>
   <!--  MODAL EDITAR USUARIO -->
  

  <!-- The Modal -->
  <div class="modal fade" id="modalEditarCita" role="dialog">
    
    <div class="modal-dialog">
      
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background: #3c8dbc; color: white;">


            <h4 class="modal-title">Editar cita</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          
          <div class="modal-body">

            <div class="box-body">

            <div class="form-group">

              <!-- EDITAR NOMBRE-->

                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevonombre" placeholder="Ingresar nombre" required>
                  
                </div>
              </div>


              <!-- EDITAR NOMBRE DE MASCOTA-->

              <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-paw"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaNombreMascota" placeholder="Ingresar nombre de la mascota"  required>
                  
                 </div>  
                </div> 

                
                             
                  <!--EDITAR FECHA-->
                

                

                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="date" class="form-control input-lg" name="nuevaFecha" placeholder="Ingresar fecha" required>
                  
                </div>
              </div>             
                              
                  <!--EDITAR HORA-->
                

                

                    <div class="form-group">
                    <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="time" class="form-control input-lg" name="nuevaHora" placeholder="Ingresar hora" required>
                    
                  </div>
                </div> 

                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaMedico" placeholder="Ingresar Medico"  required>
                  
                 </div>  
                </div> 

                 <!-- EDITAR CONSULTORIO-->
                

               


                 <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-hospital-o"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaFecha" placeholder="Ingresar consultorio"  required>
                  
                 </div>  
                </div>   


            </div>
          </div> 

          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Modificar cita</button>

          </div>

          
      </form>

      </div>
    </div>
  </div>
 