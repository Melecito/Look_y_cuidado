<div class="content-wrapper">
  
  <section class="content-header">


    <h1>
      Crear venta

     
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Crear venta</li>

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

          <form role="form" method="post">

           <div class="box-body">            
              
              <div class="box">

                <!--========================
                ENTRADA DEL VENDEDOR
                =====================-->
                
                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" name="nuevoVendedor" id="nuevoVendedor" value="UsuarioAdministrador" readonly>

                  </div>

                </div>

                <!--========================
                ENTRADA DE LA VENTA
                =====================-->

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control" name="nuevaVenta" id="nuevaVenta" value="10002343" readonly>

                  </div>

                </div>

                <!--========================
                ENTRADA DEL CLIENTE
                =====================-->

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <select class="form-control" name="seleccionarCliente" id="seleccionarCliente" required>

                    <option value="">Seleccionar cliente</option>

                    </select>

                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>

                  </div>

                </div>

                <!--========================
                ENTRADA DEL PRODUCTO
                =====================-->

                <div class="form-group row nuevoProducto">

                  <!-- Descripcion del producto -->

                  <div class="col-xs-6" style="padding-right: 0px">

                    <div class="input-group">

                      <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>

                      <input type="text" class="form-control" name="agregarProducto" id="agregarProducto" placeholder="Descripción del producto" required>
                      
                    </div>                    

                  </div>

                  <!-- Cantidad del producto -->

                  <div class="col-xs-3">

                    <input type="number" class="form-control" name="nuevaCantidadProducto" id="nuevaCantidadProducto" min="1" placeholder="0" required>
                    

                  </div>

                  <!-- Precio del producto -->

                  <div class="col-xs-3" style="padding-left: 0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                      <input type="number" class="form-control" name="nuevoPrecioProducto" id="nuevoPrecioProducto" min="1" placeholder="000000" readonly required>

                    
                    </div>                    

                  </div>

                </div>

                <!--=============================
                  BOTON PARA AGREGAR PRODUCTO
                  ============================-->

                  <button type="button" class="btn btn-default hidden-lg">Agregar producto</button>

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

                              <input type="number" class="form-control" min="0" name="nuevoImpuestoVenta" id="nuevoImpuestoVenta" placeholder="0" required>
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                              

                            </div>

                          </td>

                          <td style="width: 50%">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                              <input type="number" class="form-control" min="0" name="nuevoTotalVenta" id="nuevoTotalVenta" placeholder="0000" required>
                                                

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
                          <option value="efectivo">Efectivo</option>
                          <option value="tarjetaCredito">Tarjeta credito</option>
                          <option value="tarjetaDebito">Tarjeta debito</option>
                        </select>

                      </div>

                    </div>

                    <div class="col-xs-6" style="padding-left:0px">

                      <div class="input-group">

                      <input type="text" class="form-control" name="nuevoCodigoTransaccion" id="nuevoCodigoTransaccion" placeholder="Código transacción" required>

                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                      </div>
                      
                    </div>

                  </div>

                  <br>                  

              </div>           

          </div>

          <div class="box-footer">
             
            <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>
            

          </div>

        </form>
          
        </div>

      </div>


        <!--========================
          LA TABLA DE ESCRITORIO
          =====================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablas">
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

              <tbody>
                <tr>
                  <td>1</td>
                  <td><img src="vistas/img/productos/monello.jpeg" class="img-thumbnail" width="40px"></td>
                  <td>00012</td>
                  <td>Arenero</td>
                  <td>50</td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </td>

                </tr>
              </tbody>

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





