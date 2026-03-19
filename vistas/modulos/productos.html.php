<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

          <button class="btn btn-primary" 
          data-toggle="modal"
          data-target="#modalAgregarProducto">
            Agregar producto
          </button>    

          
        </div>

        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive-responsive tablas">
            
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

            <tbody>

              


              


              <tr>

                <td>1</td>
                <td><img src="vistas/img/productos/monello.jpeg" class="img-thumbnail" width="40px"></td>
                <td>0001</td>
                <td>Monello 1 kilo</td>
                <td>Comida</td>
                <td>20</td>
                <td>$ 10.000</td>
                <td>$ 21.000</td>
                <td>2022-05-05 22:20:45</td>
                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>


                </td>
                
              </tr>

              <tr>

                <td>1</td>
                 <td><img src="vistas/img/productos/monello.jpeg" class="img-thumbnail" width="40px"></td>
                <td>0001</td>
                <td>Monello 1 kilo</td>
                <td>Comida</td>
                <td>20</td>
                <td>$ 10.000</td>
                <td>$ 21.000</td>
                <td>2022-05-05 22:20:45</td>
                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>


                </td>
                
              </tr>

              <tr>

                <td>1</td>
                 <td><img src="vistas/img/productos/monello.jpeg" class="img-thumbnail" width="40px"></td>
                <td>0001</td>
                <td>Monello 1 kilo</td>
                <td>Comida</td>
                <td>20</td>
                <td>$ 10.000</td>
                <td>$ 21.000</td>
                <td>2022-05-05 22:20:45</td>
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


  
  <!--  MODAL AGREGAR PRODUCTO -->
  

  <!-- The Modal -->
  <div class="modal" id="modalAgregarProducto">
    
    <div class="modal-dialog">
      
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background: #3c8dbc; color: white;">


            <h4 class="modal-title">Agregar producto</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          
          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL CODIGO-->
              
              <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar codigo" required>
                  
                </div>
              </div>

                
                 <!-- ENTRADA PARA LA DESCRIPCIÓN-->        


                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripcion" required>
                  
                 </div>  
                </div>                
                   <!--ENTRADA PARA SELECCIONAR CATEGORÍA-->
                

                

                <div class="form-group">

                  <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-cart-arrow-down"></i></span>

                  <select class="form-control input-lg" name="nuevoPerfil">
                     <option value="">Seleccione una categoria</option>

                    <option value="jugetes">Jugetes</option>

                    <option value="salud">Salud</option>

                    <option value="comida">Comida</option>

                    <option value="arenas">Arenas</option>

                    <option value="belleza">Belleza</option>

                    <option value="hogar">Hogar</option>

                    <option value="viajes">Viajes</option>                


                  </select>


                  
                 </div>
              </div> 

              <!-- ENTRADA PARA SCTOK-->        


                <div class="form-group">
                   <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevStock" placeholder="stock" min="0" required>
                  
                 </div>  
                </div>              
                              
                 

                 <!--AGREGAR PRECIO DE COMPRA--> 

                <div class="form-group row">

                  <div class="col-xs-6">                    
                  
                     <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                    <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" placeholder="precio de compra" min="0" required>
                    
                   </div>

                 </div>  
                

                 <!--AGREGAR PRECIO DE VENTA--> 

                   <div class="col-xs-6">
                     <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" placeholder="precio de venta" min="0" required>
                    
                   </div>
                   <br>


                   <!--Checkbox para porcentaje-->

                   <div class="col-xs-6">

                     <div class="form-group">

                      <label>
                          <input type="checkbox" class="minimal porcentaje" checked>
                          Utilizar porcentaje

                      </label>

                     </div>

                   </div> 

                    <!--entrada para porcentaje-->

                    <div class="col-xs-6" style="padding: 0;">
                      
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
          

          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar producto</button>

          </div>
      </form>

      </div>
    </div>
  </div>