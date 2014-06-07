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

        <title>Listado de Categorias</title><!-- Bootstrap core CSS -->
        <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
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
                var fields = ['idEtiqueta', 'nombreEtiqueta'];
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
                $(document).on("click", "#openEditarCategoria", function() {
                    $(".modal-body #editar_idEtiqueta").val(item['idEtiqueta']);
                    $(".modal-body #editar_nombreEtiqueta").val(item['nombreEtiqueta']);
                    // anda okey
                    //As pointed out in comments, 
                    //it is superfluous to have to manually call the modal.
                    // $('#addBookDialog').modal('show');
                });
                $(document).on("click", "#openEliminarCategoria", function() {
                    $(".modal-body #eliminar_nombreEtiqueta").val(item['nombreEtiqueta']);
                    $(".modal-body #eliminar_idEtiqueta").val(item['idEtiqueta']);

                });
            });
        </script>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://ingenieriaii.url.ph/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="http://ingenieriaii.url.ph/css/custom.css" rel="stylesheet" type="text/css" />

    </head>

    <?php include './modalCategoria.php' ?>
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
                                <th>Nombre de Categoria</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include '../dbconnection.php';

                            $link = connectdb();

                            include '../queries.php';

                            $i = 0;
                            $id = 'row' . $i;

                            $result = q_listCategoria() or die('Error en la consulta a la base de datos' . mysql_error());
                            // limitado a 5 por cuestiones de prueba
                            while ($row = mysql_fetch_array($result)) {
                                //Print out the contents of the entry 
                                echo '<tr id=' . $id . ' tabindex=' . $i . '>';
                                echo '<td style="display:none;" id=' . 'idEtiqueta' . '>' . $row['idEtiqueta'] . '</td>';
                                echo '<td id=' . 'nombreEtiqueta' . '>' . $row['nombre'] . '</td>';
                                $i++;
                            }
                            mysql_close($link);
                            ?>
                        </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-default" id="openEditarCategoria" onClick="$('#editarCategoria').modal('show')">Editar Categoria</button>
                    <p></p>
                    <button type="button" class="btn btn-danger" id="openEliminarCategoria" onClick="$('#eliminarCategoria').modal('show')">Eliminar Categoria</button> 
                </div>
            </div> <!-- /row -->
        </div><!-- /container -->
    </body>
</html>