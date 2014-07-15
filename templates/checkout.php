<?php

?>

<!DOCTYPE html>

<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <title>Cookbook - Checkout</title>

        <!-- Bootstrap core CSS -->
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <script src="/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/checkout.js" type="text/javascript"></script>
        <script src="/js/cart.js" type="text/javascript"></script>
        <script src="/js/jquery.steps.js" type="text/javascript"></script>
        <link href="/css/jquery.steps.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(function() {
                $("#wizard").steps({
                    headerTag: "h2",
                    transitionEffect: "slideLeft",
                    bodyTag: "section"
                }
                );
                
                
            });
            
        </script>

    </head>
    
    <?php include '../header.php'; ?>
    <body>

     
            <div class="container">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div id="wizard">
                         <h2>Paso 1</h2>
                         <section data-mode="async" data-url="/templates/checkout_1.html"></section>
                         <h2>Paso 2</h2>
                         <section data-mode="async" data-url="/templates/checkout_2.html"></section>
                         <h2>Paso 3</h2>
                         <section data-mode="async" data-url="/templates/checkout_3.html"></section>
                    </div>
                </div>
<!--                <div class="row form-group">
                    <div class="col-xs-12" id="wizard">
                        <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                            <li class="active" ><a href="#step-1">
                                <h4 class="list-group-item-heading">Confirmar Carrito</h4>
                                <p class="list-group-item-text">Confirme el carrito</p>
                            </a></li>
                            <li class="disabled"><a href="#step-2">
                                <h4 class="list-group-item-heading">Pago</h4>
                                <p class="list-group-item-text">Ingrese datos de pago</p>
                            </a></li>
                            <li class="disabled"><a href="#step-3">
                                <h4 class="list-group-item-heading">Confirmar Pedido</h4>
                                <p class="list-group-item-text">Confirme su pedido</p>
                            </a></li>
                        </ul>
                    </div>
                </div>-->
<!--                <div id="stepiFrame">

                </div>
                <div class="panel">
                    <div class="panel-footer">
                        <button style="float:right;" disabled type="button" name="nextStep" id="nextStep" class="btn btn-default">Next</button>
                    </div>
                </div>-->
        </div>
    </body>
</html>