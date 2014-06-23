<?php
if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <link href="" rel="shortcut icon">

        <title>Listado de Libros</title><!-- Bootstrap core CSS -->
        <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
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
            function tiene_letrasss(isbn,titulo,paginas,precio,idioma,fecha,autor,editorial){
                if (isbn === "" || paginas === "" || precio === "" || fecha === "")
                {
                    alert("Por favor no dejar campos vacios");
                    return false;
                }
                return (tiene_letras(titulo) && tiene_letras(idioma) && tiene_letras(autor) && tiene_letras(editorial))
            }
            function tiene_letras(nombre) {
                if (nombre === "") {
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
            $(document).ready(function() {
                var fields = ['ISBN', 'tituloLibro', 'paginasLibro', 'precioLibro', 'idiomaLibro',
                    'fechaLibro', 'idAutorLibro', 'idEditorialLibro', 'idEtiquetaLibro'];
                var item = {}; // los dict son igual a python
                $('table.table-striped tbody tr').on('click', function() {
                    $(this).closest('table').find('td').removeClass('bg');
                    $(this).find('td').addClass('bg');
                    for (i = 0; i < fields.length; i++) {
                        item[fields[i]] = $(this).closest("tr")   // Finds the closest row <tr> 
                                .find("#" + fields[i])     // Gets a descendent with class="nr"
                                .text();
                    }
                });
                //$("#openEditarAutor").click(function () {
                $(document).on("click", "#openEditarLibro", function() {
                    $(".modal-body #editISBN").val(item['ISBN']);
                    $(".modal-body #editTitulo").val(item['tituloLibro']);
                    $(".modal-body #editLinkEditorial").val(item['idEditorialLibro']);
                    $(".modal-body #editLinkAutor").val(item['idAutorLibro']);
                    // anda okey
                    //As pointed out in comments, 
                    //it is superfluous to have to manually call the modal.
                    // $('#addBookDialog').modal('show');
                });
                 $(document).on("click", "#openEliminarLibro", function() {
                    $(".modal-body #eliminar_ISBN").val(item['ISBN']);
                    $(".modal-body #eliminar_nombreLibro").val(item['nombreLibro']);
                });
            });
        </script>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://ingenieriaii.url.ph/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="http://ingenieriaii.url.ph/css/custom.css" rel="stylesheet" type="text/css" />

    </head>

    <?php include 'modalLibro.php' ?>
    <?php include '../header.php' ?>
    <body id="listarBody">

        <div class="container">
            <div class="row">
                <div class="col-md-2"></div> 
                <div class="col-md-8">
                  <div  style="height:400px;overflow:auto;">
                    <table class="table table-hover table-bordered table-striped" id="lista">
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Titulo</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include_once '../dbconnection.php';
                            $link = connectdb();
                            include_once '../queries.php';
                            
                            $i = 0;
                            $id = 'row' . $i;
                            
                            $result = q_listLibros();
                             
                            // limitado a 5 por cuestiones de prueba
                            while ($row = mysql_fetch_array($result)) {
                                //Print out the contents of the entry 
                                echo '<tr id=' . $id . ' tabindex=' . $i . '>';
                                echo '<td id=' . 'ISBN' . '>' . $row['ISBN'] . '</td>';
                                echo '<td id=' . 'tituloLibro' . '>' . $row['titulo'] . '</td>';
                               echo '<td style="display:none;" id=' . 'paginasLibro' . '>' . $row['paginas'] . '</td>';
//                                echo '<td style="display:none;" id=' . 'fechaLibro' . '>' . $row['fecha'] . '</td>';
//                                echo '<td style="display:none;" id=' . 'idiomaLibro' . '>' . $row['idioma'] . '</td>';
//                                echo '<td style="display:none;" id=' . 'precioLibro' . '>' . $row['precio'] . '</td>';
//                                echo '<td style="display:none;" id=' . 'idAutorLibro' . '>' . $row['Libros_idAutor'] . '</td>';
//                                echo '<td style="display:none;" id=' . 'idEidotiralLibro' . '>' . $row['Libros_idEditorial'] . '</td>';
//                                echo '<td style="display:none;" id=' . 'idEtiquetaLibro' . '>' . $row['Libros_idEtiqueta'] . '</td>';
                                $i++;
                            }
                            mysql_close($link);
                            ?>
                        </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-default" id="openEditarLibro" onClick="$('#editarLibro').modal('show')">Editar Libro</button>
                    <p></p>
                    <button type="button" class="btn btn-danger" id="openEliminarLibro" onClick="$('#eliminarLibro').modal('show')">Eliminar Libro</button> 
                </div>
            </div> <!-- /row -->
        </div><!-- /container -->
    </body>
</html>