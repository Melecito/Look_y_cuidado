<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <h1>
        Administrar categorías

       
      </h1>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar categorías</li>
      </ol>

    </section>

   
    <section class="content">

     
      <div class="box">

        <div class="box-header with-border">    

          <button class="btn btn-primary" 
          data-toggle="modal"
          data-target="#modalAgregarCategoria">
            Agregar categoría
          </button>    

          
        </div>

        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive-responsive tablas">
            
            <thead>
              
              <tr>
                
                <th>#</th>
                <th>Categoria</th>
                <th>Acciones</th>              
                


              </tr>


            </thead>

            <tbody>

              <tr>

                <td>1</td>
                <td>COMIDA</td>
                <td>
                
               
                  
                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>


                </td>
                
              </tr>
               <tr>

                <td>1</td>
                <td>COMIDA</td>
                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>


                </td>               
               
                  
                 
                </td>
                
              </tr>

               <tr>

                <td>1</td>
                <td>COMIDA</td>
                <td>
                  
                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
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


  
  <!--  MODAL AGREGAR CATEGORIA -->
  

  <!-- The Modal -->
  <div class="modal fade" role="dialog" id="modalAgregarCategoria">
    
    <div class="modal-dialog">
      
      <div class="modal-content">

        <form role="form" method="post" >

           <!--   CABEZA MODAL  -->

          <div class="modal-header" style="background: #3c8dbc; color: white;">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar categoria</h4>
            
          </div>

           <!-- CUERPO MODAL -->

          
          <div class="modal-body">

              <div class="box-body">

                 <!--  ENTRADA PARA NOMBRE -->
                
                <div class="form-group">
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                   <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoria" required>
                    
                  </div>

                </div> 

              </div>

            </div>
          
            <!-- PIE MODAL -->
          
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar categoría</button>

          </div>
      </form>

      </div>
    </div>
  </div>