<!DOCTYPE html>
<html>

<head>
<?php
  session_start();

    //$username = $_SESSION['username'];
    //$email = $_SESSION['email'];


  if (isset($_SESSION['loggedin'])) {
    include 'header2.php';
  } else {
    header('Location: /mrs/docs/examples/jumbotron/index.php');
  }
?>
</head>

  <body>

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="page-header">Movie listing</h1>
  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu justo a risus varius feugiat. Sed consectetur nulla venenatis purus dapibus, ac rhoncus tellus euismod. Proin suscipit a metus vitae malesuada. Curabitur ac mauris eget turpis pretium consectetur. Proin pulvinar varius consequat. Curabitur ac mauris elit. Pellentesque porta ipsum et lacus ultrices, ut elementum est tempus. Nunc id euismod velit, sit amet gravida sem.</p>
        
        <!-- 
        <p>MovieBook helps you find movies you will like. Rate movies to build a custom taste profile, then MovieBook recommends other movies for you to watch.</p>
        -->
              </div>
    </div>



 
 <div class="container">

    <div class="alert alert-info">
        <a id="fullscreen" href="#fullscreen" class="alert-link"><strong>Click here</strong></a> to view this snippet in an iframe.
        <i class="fa fa-info-circle fa-2x pull-right"></i>
    </div>
           
    <h1> <i class="fa fa-shopping-cart"></i> Produtos <small> - click on product for details</small> <a href="http://bootsnipp.com/alisonpedro/snippets/Q60Oj" class="btn btn-danger pull-right hide" id="back-to-bootsnipp">Back to Bootsnipp</a></h1>
        
    <hr>
        
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#Cod</th>
          <th>Name</th>
          <th>Manufacturers</th>
          <th>Model</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Dell 18.5 Inch Monitor</td>
          <td>Dell</td>
          <td>IN1930</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Intel Core i5</td>
          <td>Intel</td>
          <td>Core i5</td>
        </tr>
        <tr>
          <td>3</td>
          <td >Gaming Keyboard G510</td>
          <td>Logitech</td>
          <td>G510</td>
        </tr>
        
        <tr>
          <td>1</td>
          <td>Dell 18.5 Inch Monitor</td>
          <td>Dell</td>
          <td>IN1930</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Intel Core i5</td>
          <td>Intel</td>
          <td>Core i5</td>
        </tr>
        <tr>
          <td>3</td>
          <td >Gaming Keyboard G510</td>
          <td>Logitech</td>
          <td>G510</td>
        </tr>        
      </tbody>
    </table>  
    
    <div class="col-sm-12 ">
        <div class="result pull-left"><strong>Mostrando 1 até 6 de 5000</strong></div>

        <ul class="pagination pull-right">
          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>       
        
    </div>
    
   
        
</div>

<!-- Modal -->
            <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-shopping-cart"></i> <strong>02051</strong> - Nome do Produto </h4>
                  </div>
                  <div class="modal-body">
                  
                    <table class="pull-left col-md-8 ">
                         <tbody>
                             <tr>
                                 <td class="h6"><strong>Código</strong></td>
                                 <td> </td>
                                 <td class="h5">02051</td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Descrição</strong></td>
                                 <td> </td>
                                 <td class="h5">descrição do produto</td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Marca/Fornecedor</strong></td>
                                 <td> </td>
                                 <td class="h5">Marca do produto</td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Número Original</strong></td>
                                 <td> </td>
                                 <td class="h5">0230316</td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Código N.C.M</strong></td>
                                 <td> </td>
                                 <td class="h5">032165</td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Código de Barras</strong></td>
                                 <td> </td>
                                 <td class="h5">0321649843</td>
                             </tr>  

                             <tr>
                                 <td class="h6"><strong>Unid. por Embalagem</strong></td>
                                 <td> </td>
                                 <td class="h5">50</td>
                             </tr>                            

                             <tr>
                                 <td class="h6"><strong>Quantidade Mínima</strong></td>
                                 <td> </td>
                                 <td class="h5">50</td>
                             </tr>

                             <tr>
                                 <td class="h6"><strong>Preço Atacado</strong></td>
                                 <td> </td>
                                 <td class="h5">R$ 35,00</td>
                             </tr> 
                            
                             <tr>
                                 <td class="btn-mais-info text-primary">
                                     <i class="open_info fa fa-plus-square-o"></i>
                                     <i class="open_info hide fa fa-minus-square-o"></i> informações
                                 </td>
                                 <td> </td>
                                 <td class="h5"></td>
                             </tr> 

                         </tbody>
                    </table>
                             
                         
                    <div class="col-md-4"> 
                        <img src="http://lorempixel.com/150/150/technics/" alt="teste" class="img-thumbnail">  
                    </div>
                    
                    <div class="clearfix"></div>
                   <p class="open_info hide">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                  </div>
                    
                  <div class="modal-footer">       
                      
                    <div class="text-right pull-right col-md-3">
                        Varejo: <br/> 
                        <span class="h3 text-muted"><strong> R$50,00 </strong></span></span> 
                    </div> 
                      
                    <div class="text-right pull-right col-md-3">
                        Atacado: <br/> 
                        <span class="h3 text-muted"><strong>R$35,00</strong></span>
                    </div>
                     
                </div>
              </div>
            </div>
            </div>
<!-- fim Modal-->    
    
    <script src="/listing.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    
</body>

</html>
