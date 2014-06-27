<?php
    include '../restricted/securitycheck.php';
    if (!loginCheck() or !adminCheck()) {
        header('Location: ../403.html');
        exit();
    }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <link href="../theme.css" rel="stylesheet">
        <title>Cookbook</title>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script src='/js/notifications.js' type='text/javascript'></script>
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" language="javascript">
            function tiene_letrass(nombre, numero) {
                if (nombre === "" || numero === "")
                {
                    alert("Por favor no dejar campos vacios");
                    return false;
                }
                var letras = " a b c d e f g h i j k l m n ñ o p q r s t u v w x y z ";
                nombre = nombre.toLowerCase();
                for (i = 0; i < nombre.length; i++) {
                    if (letras.indexOf(nombre.charAt(i), 0) === -1) {
                        alert('ERROR. Solo se pueden ingresar letras');
                        return false;
                    }
                }
                return true;
            }
            function tiene_letrasss(titulo,idioma){
                return (tiene_letras(titulo) && tiene_letras(idioma))
            }
            function tiene_letras(nombre) {
                var letras = " a b c d e f g h i j k l m n ñ o p q r s t u v w x y z ";
                nombre = nombre.toLowerCase();
                for (i = 0; i < nombre.length; i++) {
                    if (letras.indexOf(nombre.charAt(i), 0) === -1) {
                        alert('ERROR. Solo se pueden ingresar letras');
                        return false;
                    }
                }
                return true;
            }
        </script>
    </head>

    <?php
    include '../header.php';
    include 'modalAutor.php';
    include 'modalCategoria.php';
    include 'modalEditorial.php';
    include 'modalLibro.php';
    ?>
    <body>
        <script type="text/javascript">
            function redirect(target) {
                window.location.href = target;
            }

        </script>
        <div class="page-header">
            <h1>Panel de administrador</h1>
        </div>
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Autores</h3>
            </div><div class="panel-body">
                <ul>
                    <button type='button'class="btn btn-success" data-toggle="modal" data-target="#agregarAutor">Agregar</button>
                    <button type="button" class="btn btn-primary" onclick="redirect('listarAutor.php')">Listar</button>
                </ul>
            </div></div>
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Categorias</h3>
            </div><div class="panel-body">
                <ul>
                    <button type='button'class="btn btn-success" data-toggle="modal" data-target="#agregarCategoria">Agregar</button>
                    <button type="button"class="btn btn-primary" onclick="redirect('listarCategoria.php')">Listar</button>
                </ul>
            </div></div>
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Editoriales</h3>
            </div><div class="panel-body">
                <ul>
                    <button type='button'class="btn btn-success" data-toggle="modal" data-target="#agregarEditorial">Agregar</button>
                    <button type="button"class="btn btn-primary" onclick="redirect('listarEditorial.php')">Listar</button>
                </ul>
            </div></div>

        
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Libros</h3>
            </div><div class="panel-body">
                <ul>
                    <form class="form-horizontal" id="listarLibro" method="post" action="listarLibro.php" role="form">
                        <button type='button'class="btn btn-success" data-toggle="modal" data-target="#agregarLibro">Agregar</button><p></p> 
                        <input type="date" class="form-control" id="fecha1Libro" name="fecha1Libro"><p></p>
                        <input type="date" class="form-control" id="fecha2Libro" name="fecha2Libro"><p></p>
                        <span class="help-block">En caso de no ingresar alguna de las dos fechas, se listaran todos los libros</span><p></p>
                        <button type='submit'class="btn btn-primary" onclick="redirect('listarLibro.php')">Listar</button>
                    </form>
                </ul>
            </div></div>
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Usuarios</h3>
            </div><div class="panel-body">
                <ul>
                    <form class="form-horizontal" id="listarUsuario" method="post" action="listarUsuario.php" role="form">
                        <input type="date" class="form-control" id="fecha1Usuario" name="fecha1Usuario"><p></p>
                        <input type="date" class="form-control" id="fecha2Usuario" name="fecha2Usuario"><p></p>
                        <span class="help-block">En caso de no ingresar alguna de las dos fechas, se listaran todos los usuarios</span>
                        <button type='submit'class="btn btn-primary" onclick="redirect('listarUsuario.php')">Listar</button>
                    </form>   
                </ul>
            </div></div>
        
        
    </body>