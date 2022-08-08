<div class="content-wrapper">
    
  <section class="content-header">


      <h1>
        Administrar productos
       
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar productos</li>
      </ol>

    </section>

   
    <section class="content">
     
      <div class="box">

        <div class="box-header with-border">    

          <button class="btn btn-primary" data-toggle="modal"    data-target="#modalAgregarProducto">

            Agregar producto

          </button>    

          
        </div>

        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive-responsive tablaProductos">
            
            <thead>  

                      
              
              <tr>
                
                <th style="width: 10px;">#</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <th>Acciones</th>


              </tr>

            </thead>

            

          </table>


        </div>
      
      </div>


      <!-- /.box -->

    </section>

    
  </div>


 <!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

  <!-- The Modal -->
  <div class="modal fade" id="modalAgregarProducto" role="dialog">
    
    <div class="modal-dialog">
      
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
           CABEZA DEL MODAL
           ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white;">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar producto</h4>
            
          </div>

           <!--=====================================
           CUERPO DEL MODAL
           ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!--ENTRADA PARA SELECCIONAR CATEGORÍA-->

                <div class="form-group">

                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-cart-arrow-down"></i></span>

                  <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>

                     <option value="">Seleccione una categoria</option>

                     <?php 

                     $item = null;
                     $valor = null;

                     $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);



                     foreach ($categorias as $key => $value) {
                       

                       echo '<option value="'.$value["id"].'" >'.$value["categoria"].'</option>';
                       }


                     

                     ?>
                   

                  </select>


                  
                 </div>
              </div> 

              <!-- ENTRADA PARA EL CODIGO-->
              
              <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoCodigo" id="nuevoCodigo" placeholder="Ingresar codigo" readonly required>
                  
                </div>
              </div>

                
                 <!-- ENTRADA PARA LA DESCRIPCIÓN-->        


                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripcion" required>
                  
                 </div>  
                </div>                
                   

              <!-- ENTRADA PARA SCTOK-->        


                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevoStock" placeholder="stock" min="0" required>
                  
                 </div>  
                </div>              
                              
                 

                 <!--AGREGAR PRECIO DE COMPRA--> 

                <div class="form-group row">

                  <div class="col-xs-12 col-sm-6">                    
                  
                     <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                    <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" id="nuevoPrecioCompra" placeholder="precio de compra" min="0" step="any" required>
                    
                   </div>

                 </div>  
                

                 <!--AGREGAR PRECIO DE VENTA--> 

                   <div class="col-xs-12 col-sm-6">
                     <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" id="nuevoPrecioVenta" placeholder="precio de venta" min="0" step="any" required>
                    
                   </div>
                   <br>


                   <!--Checkbox para porcentaje-->

                   <div class="col-xs-12 col-sm-8">

                     <div class="form-group">

                      <label>
                          <input type="checkbox" class="minimal porcentaje" checked>
                          Utilizar porcentaje

                      </label>

                     </div>

                   </div> 

                    <!--entrada para porcentaje-->

                    <div class="col-xs-12 col-sm-6" style="padding: 0;">
                      
                      <div class="input-group">
                        
                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                      </div>

                    </div>


                 </div> 
                </div>  


                 <!--AGREGAR IMAGEN-->                   


                <div class="form-group">
                    <div class="panel">SUBIR IMAGEN</div>

                  <input type="file" class="nuevaImagen" name="nuevaImagen">

                  <p class="help-block">Peso maximo de la foto 2 MB</p>

                  <img src="vistas/img/productos/monello.jpeg" class="img-thumbnail previsualizar" width="100px">

                   

              </div>
                        
                

              </div> 


            </div>
          
             <!--=====================================
              PIE DEL MODAL
             ======================================-->
          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar producto</button>

          </div>
      </form>

      <?php

      $crearProducto = new ControladorProductos();
      $crearProducto->ctrCrearProducto();

      ?>


      </div>
    </div>
  </div>

  <!--=====================================
  MODAL EDITAR PRODUCTO
  ======================================-->

  <!-- The Modal -->
  <div class="modal fade" id="modalEditarProducto" role="dialog">
    
    <div class="modal-dialog">
      
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
           CABEZA DEL MODAL
           ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white;">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar producto</h4>
            
          </div>

           <!--=====================================
           CUERPO DEL MODAL
           ======================================-->

          <div class="modal-body">

            <div class="box-body">


              <!--ENTRADA PARA SELECCIONAR CATEGORÍA-->

                <div class="form-group">

                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-cart-arrow-down"></i></span>

                  <select class="form-control input-lg"  name="editarCategoria" readonly required>

                     <option id="editarCategoria"></option>                   
                   

                  </select>

                 </div>

              </div> 

              <!-- ENTRADA PARA EL CODIGO-->
              
              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>

                  <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>
                  
                </div>
              </div>

                
                 <!-- ENTRADA PARA LA DESCRIPCIÓN-->        


                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                  <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
                  
                 </div>  
                </div>                
                   

              <!-- ENTRADA PARA SCTOK-->        


                <div class="form-group">

                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-check"></i></span>

                  <input type="number" class="form-control input-lg" name="editarStock" id="editarStock" min="0" required>
                  
                 </div>  
                </div>              
                              
                 

                 <!--AGREGAR PRECIO DE COMPRA--> 

                <div class="form-group row">

                  <div class="col-xs-12 col-sm-6">                    
                  
                     <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                    <input type="number" class="form-control input-lg" name="editarPrecioCompra" id="editarPrecioCompra" min="0" step="any" required>
                    
                   </div>

                 </div>  
                

                 <!--AGREGAR PRECIO DE VENTA--> 

                   <div class="col-xs-12 col-sm-6">
                     <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                    <input type="number" class="form-control input-lg" name="editarPrecioVenta" id="editarPrecioVenta" min="0" step="any" readonly required>
                    
                   </div>
                   <br>


                   <!--Checkbox para porcentaje-->

                   <div class="col-xs-12 col-sm-8">

                     <div class="form-group">

                      <label>
                          <input type="checkbox" class="minimal porcentaje" checked>
                          Utilizar porcentaje

                      </label>

                     </div>

                   </div> 

                    <!--entrada para porcentaje-->

                    <div class="col-xs-12 col-sm-6" style="padding: 0;">
                      
                      <div class="input-group">
                        
                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                      </div>

                    </div>


                 </div> 
                </div>  


                 <!--AGREGAR IMAGEN-->                   


                <div class="form-group">
                    <div class="panel">SUBIR IMAGEN</div>

                  <input type="file" class="nuevaImagen" name="editarImagen">

                  <p class="help-block">Peso maximo de la foto 2 MB</p>

                  <img src="vistas/img/productos/monello.jpeg" class="img-thumbnail previsualizar" width="100px">

                  <input type="hidden" name="imagenActual" id="imagenActual">

                   

              </div>
                        
                

              </div> 


            </div>
          
             <!--=====================================
              PIE DEL MODAL
             ======================================-->
          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>

          </div>
      </form>

      <?php

      $editarProducto = new ControladorProductos();
      $editarProducto->ctrEditarProducto();

      ?>


      </div>
    </div>
  </div>

     <?php

      $eliminarProducto = new ControladorProductos();
      $eliminarProducto->ctrEliminarProducto();

      ?>





