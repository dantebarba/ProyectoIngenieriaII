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
        <div class="container">
        <div class="row">    
            <div class="col-xs-8 col-xs-offset-2">
                <form type="get" action="search.php" name="searchForm" id="searchForm">
                    <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="search_concept">Buscar por</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#byTitulo">Titulo</a></li>
                              <li><a href="#byAutor">Autor</a></li>
                              <li><a href="#byCategoria">Categoria</a></li>
                              <li class="divider"></li>
                              <li><a href="#all">Cualquiera</a></li>
                            </ul>
                        </div>

                            <input type="hidden" name="search_param" value="all" id="search_param">         
                            <input type="text" class="form-control" name="keyword" placeholder="Busqueda...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                    </div>
               </form>
            </div>
            </div>
        </div>
            <hr>

            <footer>
                <p>&copy; CompumundoHiperMegaRed 2014</p>
            </footer>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
     
    </body>
    <script type="text/javascript">
        $(document).ready(function(e){
            $('.search-panel .dropdown-menu').find('a').click(function(e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#","");
                var concept = $(this).text();
                $('.search-panel span#search_concept').text(concept);
                $('.input-group #search_param').val(param);
                });
        }); 
    </script>
</html>
