



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
        <script type="text/javascript" language="javascript">

            function tiene_letras(nombre) {
                var letras = "abcdefghyjklmnñopqrstuvwxyz";
                nombre = nombre.toLowerCase();
                for (i = 0; i < nombre.length; i++) {
                    if (letras.indexOf(nombre.charAt(i), 0) === -1) {
                        alert('ERROR. Solo se pueden ingresar letras');
                        return false;
                    }
                }
                return true;
            }
            function tiene_numeros(nombre) {
                var numeros = "0123456789";
                for (i = 0; i < nombre.length; i++) {
                    if (numeros.indexOf(numeros.charAt(i), 0) === -1) {
                        alert('ERROR. Solo se pueden ingresar numeros');
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

        <!--
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Libros</h3>
            </div><div class="panel-body">
                <ul>
                    <button type='button'class="btn btn-success" data-toggle="modal" data-target="#agregarLibro">Agregar</button>
                    <button type='button'class="btn btn-warning">Modificar</button>
                   </ul>
            </div></div>
        -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js"></script>
    </body>