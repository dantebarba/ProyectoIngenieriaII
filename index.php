<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <title>Cookbook</title>

        <!-- Bootstrap core CSS -->
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="jumbotron.css" rel="stylesheet">
        <script src="/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js"></script>
    </head>

    <?php include 'header.php'; ?>
    <body>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                       <img src="http://ingenieriaii.url.ph/images/logo.png" alt="Logo" class="img-rounded center-block"</img>
                       <p>Cookbook ofrece servicio de ventas de libros culinarios tanto para cocineros aficionados como experimentados.</p>
            </div>
        </div>
            <hr>

            <footer>
                <?php echo $_SESSION['user']; ?>
                <p>&copy; CompumundoHiperMegaRed 2014</p>
            </footer>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
        
    </body>
</html>
