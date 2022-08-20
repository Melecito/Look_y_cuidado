<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <h1>
        Administrar usuarios

       
      </h1>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar usuarios</li>
      </ol>

    </section>

   
    <section class="content">

     
      <div class="box">
        <div class="box-header with-border">    

          <button class="btn btn-primary" 
          data-toggle="modal"
          data-target="#modalAgregarUsuario">
            Agregar usuario
          </button>
                   

          
        </div>

        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive-responsive tablas">
            
            <thead>
              
              <tr>
                
               <th style="width:10px">#</th>
               <th>Nombre</th>
               <th>Documento ID</th>
               <th>Email</th>
               <th>Teléfono</th>
               <th>Dirección</th>
               <th>Fecha nacimiento</th> 
               <th>Total compras</th>
               <th>Última compra</th>
               <th>Última cita</th>
               <th>Ingreso al sistema</th>
               <th>Acciones</th>


              </tr>


            </thead>

            <tbody>

              <tr>

                <td>1</td>
                <td>Camilo Perez</td>
                <td>74158962</td>
                <td>cami@gmail.com</td>
                <td>3208547595</td>
                <td>Calle 34 # 23 - 34</td>
                <td>2001-05-05</td>
                <td>200000</td>
                <td>Peine</td>
                <td>2022-04-05</td>
                <td>2022-05-05</td>
                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>


                </td>
                
              </tr>

              <tr>

                <td>2</td>
                <td>Claudia Melo</td>
                <td>74158962</td>
                <td>cami@gmail.com</td>
                <td>3208547595</td>
                <td>Calle 34 # 23 - 34</td>
                <td>2001-05-05</td>
                <td>200000</td>
                <td>Peine</td>
                <td>2022-04-05</td>
                <td>2022-05-05</td>
                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>


                </td>
                
              </tr>

              <tr>

                <td>3</td>
                <td>Liliana Diaz</td>
                <td>74158962</td>
                <td>cami@gmail.com</td>
                <td>3208547595</td>
                <td>Calle 34 # 23 - 34</td>
                <td>2001-05-05</td>
                <td>200000</td>
                <td>Peine</td>
                <td>2022-04-05</td>
                <td>2022-05-05</td>
                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>


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

            <h4 class="modal-title">Agregar usuario</h4>
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

                
                 <!-- AGREGAR USUARIO-->
                

               


                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevousuario" placeholder="Ingresar usuario" required>
                  
                 </div>  
                </div>                
                  <!--AGREGAR CONTRASEÑA-->
                

                

                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="nuevopassword" placeholder="Ingresar contraseña" required>
                  
                </div>
              </div>             
                              
                  <!--AGREGAR PERFIL-->
                

                

                <div class="form-group">

                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                  <select class="form-control input-lg" name="nuevoPerfil">

                    <option value="Administrador">Administrador</option>

                    <option value="Almacenista">Almacenista</option>

                    <option value="Vendedor">Vendedor</option>

                    <option value="Cajero">Cajero</option>

                    <option value="MedicoVet">Medico</option>                


                  </select>


                  
                 </div>
              </div>

                 <!--AGREGAR FOTO-->            

                


                <div class="form-group">
                    <div class="panel">SUBIR FOTO</div>

                  <input type="file" id="nuevaFoto" name="nuevaFoto">

                  <p class="help-block">Peso maximo de la foto 200 MB</p>

                  <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
              </div>
                       
                

              </div>


            </div>
          
          <!-- PIE MODAL -->
          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar usuario</button>

          </div>
      </form>

      </div>
    </div>
  </div>