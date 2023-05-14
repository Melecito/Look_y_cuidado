<div class="content-wrapper">
  
  <section class="content-header">


    <h1>
      Editar venta

     
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Editar venta</li>

    </ol>

  </section>

 
  <section class="content">

    <div class="row">

      <!--========================
          Formulario
          =====================-->

      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">

          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

           <div class="box-body">            
              
              <div class="box">

                <?php

                    $item = "idVenta";
                    $valor = $_GET["idVenta"];

                    $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

                    $itemUsuario = "id";
                    $valorUsuario = $venta["id_vendedor"];

                    $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                    $itemCliente = "idCliente";
                    $valorCliente = $venta["idCliente"];

                    $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                    $porcentajeImpuesto = $venta["impuesto"] * 100 / $venta["neto"];


                ?>

                <!--====================
                ENTRADA DEL VENDEDOR
                =====================-->
                
                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $vendedor["nombre"];?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $vendedor["id"];?>">

                  </div>

                </div>

                <!--========================
                ENTRADA DEL CODIGO
                =====================-->

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control" name="editarVenta" id="nuevaVenta" value="<?php echo $venta["codigo"];?>" readonly>

                                      

                  </div>

                </div>

                <!--========================
                ENTRADA DEL CLIENTE
                =====================-->

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <select class="form-control" name="seleccionarCliente" id="seleccionarCliente" required>

                    <option value="<?php echo $cliente["IdCliente"]; ?>"><?php echo $cliente["Nombre"]; ?></option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo '<option value="'.$value["IdCliente"].'">'.$value["Nombre"].'</option>';


                      }

                    ?>

                    </select>

                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>

                  </div>

                </div>

                <!--========================
                ENTRADA DEL PRODUCTO
                =====================-->

                 <div class="form-group row nuevoProducto">


                  <?php

                      $listaProducto = json_decode($venta["productos"], true);

                      foreach ($listaProducto as $key => $value) {

                        $item = "IdProduc";
                        $valor = $value["IdProduc"];
                        $orden = "IdProduc";

                        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                        $stockAntiguo = $respuesta["Stock"] + $value["Cantidad"];
                        
                        echo '<div class="row" style="padding:5px 15px">
                  
                              <div class="col-xs-6" style="padding-right:0px">
                  
                                <div class="input-group">
                      
                                  <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'.$value["IdProduc"].'"><i class="fa fa-times"></i></button></span>

                                  <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["IdProduc"].'" name="agregarProducto" value="'.$value["Descripcion"].'" readonly required>

                                </div>

                              </div>

                              <div class="col-xs-3">
                    
                                <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["Cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["Stock"].'" required>

                              </div>

                              <div class="col-xs-3 ingresoPrecio" style="padding-left:0px">

                                <div class="input-group">

                                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                         
                                  <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$respuesta["PrecioVenta"].'" name="nuevoPrecioProducto" value="'.$value["total"].'" readonly required>
         
                                </div>
                     
                              </div>

                            </div>';
                      }


                ?>

                  

                </div> 

                <input type="hidden" name="listaProductos" id="listaProductos">

                <!--=============================
                  BOTON PARA AGREGAR PRODUCTO
                  ============================-->

                  <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

                  <hr>

                   <!--=============================
                  ENTRADA PARA IMPUESTOS Y TOTAL
                  ============================-->

                  <div class="row">

                    <div class="col-xs-8 pull-right">

                    <table class="table">

                      <thead>
                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>
                        </tr>

                      </thead>
                      <tbody>
                        <tr>
                          <td style="width: 50%">

                            <div class="input-group">

                              <input type="number" class="form-control input-lg" min="0" name="nuevoImpuestoVenta" id="nuevoImpuestoVenta" value="<?php echo $porcentajeImpuesto; ?>" required>

                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" value="<?php echo $venta["impuesto"]; ?>" required>

                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto"  value="<?php echo $venta["neto"]; ?>" required>


                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                              

                            </div>

                          </td>

                          <td style="width: 50%">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                              
                              <input type="text" class="form-control input-lg" min="0" name="nuevoTotalVenta" id="nuevoTotalVenta" total="<?php echo $venta["neto"]; ?>" value="<?php echo $venta["total"]; ?>" required>

                              <input type="hidden" name="totalVenta" value="<?php echo $venta["total"]; ?>" id="totalVenta">
                                                

                            </div>

                        </tr>

                      </tbody>
                      
                    </table> 

                    </div>                   

                  </div>

                  <hr>

                   <!--=============================
                  ENTRADA METODO DE PAGO
                  ============================-->
                  <div class="form-group row">

                    <div class="col-xs-6" style="padding-right: 0px">

                      <div class="input-group">

                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                          <option value="">Seleccione método de pago</option>
                          <option value="Efectivo">Efectivo</option>
                          <option value="TC">Tarjeta credito</option>
                          <option value="TD">Tarjeta debito</option>
                        </select>

                      </div>

                    </div>

                    <div class="cajasMetodoPago"></div>

                    <input type="hidden" name="listaMetodoPago" id="listaMetodoPago">                       
                   

                  </div>

                  <br>                  

              </div>           

          </div>

          <div class="box-footer">
             
            <button type="submit" class="btn btn-primary pull-right">Guardar cambios</button>
            

          </div>

        </form>

        <?php

          $editarVenta = new ControladorVentas();
          $editarVenta -> ctrEditarVenta();

          ?>

          
        </div>

      </div>


        <!--========================
          LA TABLA DE ESCRITORIO
          =====================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablaVentas">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Stock</th>
                  <th>Acciones</th>

                </tr>
              </thead>

             </table>


          </div>
          
        </div>
        


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





