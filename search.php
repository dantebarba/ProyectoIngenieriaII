<?php 
    include_once 'restricted/securitycheck.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        if (!loginCheck()) {
            $_SESSION['status'] = 'guest';
        }   
        else {
            $_SESSION['status'] = 'logged';
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <title>Buscar</title>
        <script src="/js/jquery-2.1.1.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js"></script>
        <link href='/css/custom.css' rel='stylesheet'>
        <script src="js/jPaginate.js"></script>
        <script src="js/cart.js" type="text/javascript"></script>
            <script type='text/javascript'>
            
            $(document).ready(function() {
                
                 $("#resultados").jPaginate({items: 2, position: "after"}); 
            });
           </script>
    </head>

    <?php include 'header.php'; ?>       
    <body>
        <div class='container'>
            
            <div class='col-xs-10'>
                <h3 class="text-left" >Resultados para: <?php echo $_GET['keyword']; ?> </h3>
                <hr>
            </div>
            
            <section id='resultados' class="col-xs-12 col-sm-6 col-md-12">
                
                <?php
                    require_once 'dbconnection.php';

                    $link = connectdb();

                    require_once 'queries.php';

                    function searchByTitle ($param) {
                        return q_searchLibroLike($param);
                    }

                    function searchByAutor ($param) {

                    }

                    function searchByCategoria($param) {

                    }


                    $result = null;
                    if (isset($_GET['search_param'])) { // buscamos el parametro de busqueda
                        // si es por titulo, o por categoria, etc...
                        if ($_GET['search_param'] == 'byTitulo') {
                            // search books by title
                            $result = searchByTitle($_GET['keyword']); // invocamos la funcion
                            // correspondiente con el keyword

                        }
                        else
                            if (($_GET['search_param'] == 'byAutor')) {
                                $result = searchByAutor($_GET['keyword']);
                            }
                            else
                                if ($_GET['search_param'] == 'byCategoria') {
                                    $result = searchByCategoria($_GET['keyword']);
                                }

                            while ($row = mysql_fetch_array($result)) {
                                // loop sobre todos los elementos encontrados
                                // NOTA: el array devuelto debe tener siempre los mismos campos 
                                // para TODOS los casos
                                // Se genera un html "article" por cada articulo
                                $autor = mysql_fetch_assoc(q_getAutor($row['Autores_idAutor']));
                                $editorial = mysql_fetch_assoc(q_getEditorial($row['Editoriales_idEditorial']));
                                $categoria = mysql_fetch_assoc(q_getCategoria($row['Etiquetas_idEtiqueta']));
                                // se recupera la informacion necesaria de Autor, Editorial, Categoria 
                                // y se imprime el articulo
                                echo '		
                                    <div id='.$row['ISBN'].' class="search-result row">
                                        <div class="col-xs-12 col-sm-12 col-md-3">
                                                <a href="#" title="k" class="thumbnail"><img src="http://lorempixel.com/250/140/people" alt="Lorem ipsum" /></a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                                <ul class="meta-search">
                                                        <li>Autor: <span>'.$autor['nombre'].'</span></li>
                                                        <li><i class="glyphicon glyphicon-tags"></i> <span><a href="/search.php?search_param=byCategoria&keyword='.$categoria['nombre'].'"</a>'.$categoria['nombre'].'</span></li>
                                                </ul>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                                                    <h3><a href="/libro/ver.php?ISBN='.$row['ISBN'].'" title="">'.$row["titulo"].'</a></h3>
                                                    <p>Descripcion</p>';	
                                         if ($_SESSION['status'] != 'guest') {
                                            echo '<button type="button" onClick="addToCart('.$row['ISBN'].')" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a></button>
                                            ';}
                                        echo '</div><span class="clearfix borda"></span>
                                            </div>';
                                }   
                        }
                         mysql_close($link);
                    ?>  
                        
                </section>
                <div class='holder'></div>
            </div>        
        

    </body>
</html>


