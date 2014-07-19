<?php include_once '../restricted/securitycheck.php';
      if (!logincheck()) {
          header('Location: ../403.html');
          exit();
      }
?>
 

<html>
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <title>Cookbook - Carrito</title>

        <!-- Bootstrap core CSS -->
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <script src="/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/mustache.js" type="text/javascript"></script>
        <script src="/js/cart.js" type="text/javascript"></script>
        <link href="/css/custom.css" rel="stylesheet">
        <script type="text/javascript">
            function calcTotal(articulos) {
                        var total = 0;
                        for (i=0; i < articulos.length; i++) {
                            total += articulos[i].precio * articulos[i].cantidad;
                        }
                        return total;
                    };
            function refreshTotal() {
                    ajaxGetItems(function (articulos) {
                        $("#totalValue").html('Total $'+calcTotal(articulos));
                    });
            };
            $(document).ready(function() {
               ajaxGetItems(function (articulos) { 
                    console.log(articulos);
                    $.get(
                             'articulo.php',
                             function(d){
                                     var renderedPage = Mustache.to_html( d, {items: articulos});
                                     $("#articuloiFrame").html(renderedPage);
                                 }
                     );
                     
                     $("#totalValue").html('Total $'+calcTotal(articulos));
                     if (articulos.length === 0) {
                         $("#buynow").prop("disabled", true);
                     }
                     
                });
            });
            function removeFromDisplay(element) {
                $(element).closest(".article").remove();
            };

            
        </script>    
    </head>
    
    <?php include '../header.php'; ?>
    <body>
     
    <div class="container">
            <div class="row">
                    <div class="col-xs-8">
                            <div class="panel panel-info">
                                    <div class="panel-heading">
                                            <div class="panel-title" id='articulosPanel'>
                                                    <div class="row">
                                                            <div class="col-xs-6">
                                                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Carrito de compras</h5>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <a href="../index.php" ><button type="button" class="btn btn-primary btn-sm btn-block">
                                                                            <span class="glyphicon glyphicon-share-alt"></span> Continuar comprando
                                                                    </button></a>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                                     <div class="panel-body" id='articuloiFrame'>
                                     </div>
                                    <div class="panel-footer">
                                            <div class="row text-center">
                                                    <div class="col-xs-3">
                                                        <button type="button" class="btn btn-warning btn-block" onClick="cleanCart();">Limpiar Carrito</button>
                                                    </div>
                                                    <div class="col-xs-6" >
                                                        <h4 class="text-right" id="totalValue"></h4>
                                                    </div>
                                                    <div class="col-xs-3">
                                                            <button type="button" id="buynow" class="btn btn-success btn-block" onClick="window.location.href = '/templates/checkout.php';">
                                                                    Comprar
                                                            </button>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>


    </body>
</html>    
    
