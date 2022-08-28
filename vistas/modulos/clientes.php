<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <h1>
        Administrar clientes

       
      </h1>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar clientes</li>
      </ol>

    </section>

   
    <section class="content">

     
      <div class="box">
        <div class="box-header with-border">    

          <button class="btn btn-primary" 
          data-toggle="modal"
          data-target="#modalAgregarCliente">
            Agregar cliente
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
               <th>Ingreso al sistema</th>
               <th>Acciones</th>


              </tr>


            </thead>

            <tbody>

              <?php

                $item = null;
                $valor = null;

                $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                foreach ($clientes as $key => $value) {
                  
                     echo '<tr>

                  <td>'.($key+1).'</td>
                  <td>'.$value["Nombre"].'</td>
                  <td>'.$value["Documento"].'</td>
                  <td>'.$value["email"].'</td>
                  <td>'.$value["Telefono"].'</td>
                  <td>'.$value["Direccion"].'</td>
                  <td>'.$value["Fecha_nacimiento"].'</td>
                  <td>'.$value["Compras"].'</td>
                  <td>'.$value["Ultima_compra"].'</td>
                  <td>'.$value["Fecha"].'</td>                  

                 <td>                
                    
                    <div class="btn-group">

                      <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["IdCliente"].'" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["IdCliente"].'"><i class="fa fa-times"></i></button>
                      
                    </div>


                  </td>
                  
                </tr>';
                }

              ?>

             </tbody>
            
          </table>


        </div>
      
      </div>

    </section>

   
  </div>


  
  <!--  MODAL AGREGAR CLIENTE -->
  

  <!-- The Modal -->
  <div class="modal" id="modalAgregarCliente">
    
    <div class="modal-dialog">
      
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--   CABEZA MODAL  -->

          <div class="modal-header" style="background: #3c8dbc; color: white;">

            <h4 class="modal-title">Agregar cliente</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

           <!-- CUERPO MODAL -->
          
          <div class="modal-body">

            <div class="box-body">

               <!-- AGREGAR NOMBRE-->
              
              <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>
                  
                </div>
              </div>

                
                 <!-- AGREGAR DOCUMENTO-->
                

                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoID" placeholder="Ingresar documento" required>
                  
                 </div>  
                </div> 


                  <!--AGREGAR EMAIL-->

                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>
                  
                </div>
              </div>        

                              
                  <!--AGREGAR TELEFONO-->
                
                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar telefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                  
                </div>
              </div> 

              <!--AGREGAR DIRECCION-->
                  
                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar direccion" required>
                  
                </div>
              </div> 


              <!--AGREGAR FECHA DE NACIMIENTO-->
                  
                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                  <input type="texto" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha de nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>
                  
                </div>
              </div> 

              </div>


            </div>
          
          <!-- PIE MODAL -->
          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar cliente</button>

          </div>
      </form>

      <?php

      $crearCliente = new ControladorClientes();
      $crearCliente->ctrCrearCliente();

      ?> 
 
      </div>
    </div>
  </div>


   <!--  MODAL EDITAR CLIENTE -->
  

  <!-- The Modal -->
  <div class="modal" id="modalEditarCliente">
    
    <div class="modal-dialog">
      
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--   CABEZA MODAL  -->

          <div class="modal-header" style="background: #3c8dbc; color: white;">

            <h4 class="modal-title">Editar cliente</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

           <!-- CUERPO MODAL -->
          
          <div class="modal-body">

            <div class="box-body">

               <!-- AGREGAR NOMBRE-->
              
              <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                  <input type="hidden" id="idCliente" name="idCliente">
                  
                </div>
              </div>

                
                 <!-- AGREGAR DOCUMENTO-->
                

                <div class="form-group">

                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="number" min="0" class="form-control input-lg" name="editarDocumentoID" id="editarDocumentoID" required>
                  
                 </div>  
                </div> 


                  <!--AGREGAR EMAIL-->

                <div class="form-group">

                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>
                  
                </div>
              </div>        

                              
                  <!--AGREGAR TELEFONO-->
                
                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                  
                </div>
              </div> 

              <!--AGREGAR DIRECCION-->
                  
                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>
                  
                </div>
              </div> 


              <!--AGREGAR FECHA DE NACIMIENTO-->
                  
                <div class="form-group">
                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                  <input type="texto" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>
                  
                </div>
              </div> 

              </div>


            </div>
          
          <!-- PIE MODAL -->
          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>

          </div>
      </form>

      <?php

      $editarCliente = new ControladorClientes();
      $editarCliente->ctrEditarCliente();

      ?> 
 
      </div>
    </div>
  </div>
  <?php

    $eliminarCliente = new ControladorClientes();
    $eliminarCliente->ctrEliminarCliente();

  ?>