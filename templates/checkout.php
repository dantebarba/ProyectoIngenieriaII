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
        <title>Cookbook - Carrito</title>

        <!-- Bootstrap core CSS -->
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <script src="/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/mustache.js" type="text/javascript"></script>
        <script src="../js/checkout.js" type="text/javascript"></script>
        <link href="/css/custom.css" rel="stylesheet">
    </head>
    
    <?php include '../header.php'; ?>
    <body>

    
    </body>  
    <div class="container">
	<div class="row form-group">
            <div class="col-xs-12">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li class="active" ><a href="#step-1">
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">First step description</p>
                    </a></li>
                    <li class="disabled"><a href="#step-2">
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">Second step description</p>
                    </a></li>
                    <li class="disabled"><a href="#step-3">
                        <h4 class="list-group-item-heading">Step 3</h4>
                        <p class="list-group-item-text">Third step description</p>
                    </a></li>
                </ul>
            </div>
	</div>
        <div id="stepiFrame">
            
        </div>
        <div class="panel">
            <div class="panel-footer">
                <button style="float:right;" disabled type="button" name="nextStep" id="nextStep" class="btn btn-default">Next</button>
            </div>
        </div>
</div>
</html>