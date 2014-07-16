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
        <script src="/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script src='/js/modalFunctions.js' type='text/javascript'></script>
        <script src='/js/notifications.js' type='text/javascript'></script>
        <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
        
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
                $('#lista').dataTable();
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
                    $(".modal-body #editPaginas").val(item['paginasLibro']);
                    $(".modal-body #editPrecio").val(item['precioLibro']);
                    $(".modal-body #editIdioma").val(item['idiomaLibro']);
                    $(".modal-body #editFecha").val(item['fechaLibro']);
                    $(".modal-body #editLinkEditorial").val(item['idEditorialLibro']);
                    $(".modal-body #editLinkAutor").val(item['idAutorLibro']);
                    $(".modal-body #editLinkEtiqueta").val(item['idEtiquetaLibro']);
                    $('#editarLibro').modal("show");
                    
                    // anda okey
                    //As pointed out in comments, 
                    //it is superfluous to have to manually call the modal.
                    // $('#addBookDialog').modal('show');
                });
                 $(document).on("click", "#openEliminarLibro", function() {
                    $(".modal-body #deleteISBN").val(item['ISBN']);
                    $(".modal-body #deleteTitulo").val(item['tituloLibro']);
                    $("#eliminarLibro").modal('show');
                });
                
            });
        </script>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://ingenieriaii.url.ph/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="http://ingenieriaii.url.ph/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="../css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    </head>

    <?php include_once 'modalLibro.php' ?>
    <?php include_once 'modalAutor.php' ?>
    <?php include_once 'modalEditorial.php' ?>
    <?php include_once 'modalCategoria.php' ?>
    <?php include_once '../header.php' ?>
    <body id="listarBody">

        <div class="container">
            <div class="row">
                <div class="col-md-2">
                <!-- COLUMNA FILTROS -->
                    <form class="form-horizontal" id="listarLibro" method="post" action="listarLibro.php" role="form"> 
                        <button type='submit'class="btn btn-primary form-control" onclick="redirect('listarLibro.php')">Listar Entre Fechas</button><p></p>    
                        <span class="input-radio-addon">
                                <input type="checkbox" name="registrados"> Registrados 
                        </span><p></p>
                        <input type="date" class="form-control" id="fecha1Libro" name="fecha1Libro"><p></p>
                        <input type="date" class="form-control" id="fecha2Libro" name="fecha2Libro"><p></p>
                        <span class="input-radio-addon">
                                <input type="checkbox" name="masComprados"> Mas comprados 
                        </span><p></p>
                        <input type="date" class="form-control" id="fecha3Libro" name="fecha3Libro"><p></p>
                        <input type="date" class="form-control" id="fecha4Libro" name="fecha4Libro"><p></p>
                        
                    
                    </form>
               <!-- Fin COLUMNA FILTROS-->
                </div> 
                <div class="col-md-8">
                  <div  style="height:400px;overflow:auto;">
                    <table class="table table-hover table-bordered table-striped display" id="lista">
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Titulo</th>
                                <th style="display: none;">Paginas</th>
                                <th style="display: none;">Fecha</th>
                                <th style="display: none;">Idioma</th>
                                <th style="display: none;">Precio</th>
                                <th style="display: none;">idAutor Libro</th>
                                <th style="display: none;">idEditorial Libro</th>
                                <th style="display: none;">idCategoria Libro</th>
                            
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include_once '../dbconnection.php';
                            $link = connectdb();
                            include_once '../queries.php';
                            
                            $i = 0;
                            $id = 'row' . $i;
   
                             if (isset($_POST['registrados']) || isset($_POST['masComprados'])) {
                                    $fecha1 = $_POST['fecha1Libro'];
                                    $fecha2 = $_POST['fecha2Libro'];
                                    $fecha3 = $_POST['fecha3Libro'];   
                                    $fecha4 = $_POST['fecha4Libro'];   
                                      
                                    if (isset($_POST['registrados']) && isset($_POST['masComprados'])){
                                            if (($fecha1 != "") && ($fecha2 != "")&& ($fecha3 != "")&& ($fecha4 != "")) {
                                                   $result = q_listLibrosMasCompradosRegistrados($fecha1, $fecha2, $fecha3, $fecha4);
                                            } else { $result = q_listLibros(); }
                                    } else {
                                             if (isset($_POST['registrados'])) {
                                                    if (($fecha1 != "") && ($fecha2 != "")) {
                                                        $result = q_listLibrosBetween ($fecha1, $fecha2);
                                                    } else { $result = q_listLibros(); }
                                             } else {
                                                       if (($fecha3 != "") && ($fecha4 != "")){
                                                           $result = q_listLibrosMasComprados($fecha3, $fecha4);
                                                       } else { $result = q_listLibros(); }
                                             }
                                    }
                            } else {
                                    $result = q_listLibros();
                            }
                            
                        /*    
                            if (isset($_POST['fecha1Libro']) && isset($_POST['fecha2Libro'])) {
                                $fecha1 = $_POST['fecha1Libro'];
                                $fecha2 = $_POST['fecha2Libro'];
                                if (($fecha1 != "") && ($fecha2 != "")) {
                                    $result = q_listLibrosBetween($fecha1,$fecha2);
                                    
                                }
                                else {$result = q_listLibros();}
                            }
                            else {
                                $result = q_listLibros();
                            }                              
                         * 
                         */
                            // limitado a 5 por cuestiones de prueba
                            while ($row = mysql_fetch_array($result)) {
                                //Print out the contents of the entry 
                                echo '<tr id=' . $id . ' tabindex=' . $i . '>';
                                echo '<td id=' . 'ISBN' . '>' . $row['ISBN'] . '</td>';
                                echo '<td id=' . 'tituloLibro' . '>' . $row['titulo'] . '</td>';
                                echo '<td style="display:none;" id=' . 'paginasLibro' . '>' . $row['paginas'] . '</td>';
                                echo '<td style="display:none;" id=' . 'fechaLibro' . '>' . $row['fecha'] . '</td>';
                                echo '<td style="display:none;" id=' . 'idiomaLibro' . '>' . $row['idioma'] . '</td>';
                                echo '<td style="display:none;" id=' . 'precioLibro' . '>' . $row['precio'] . '</td>';
                                echo '<td style="display:none;" id=' . 'idAutorLibro' . '>' . $row['Autores_idAutor'] . '</td>';
                                echo '<td style="display:none;" id=' . 'idEditorialLibro' . '>' . $row['Editoriales_idEditorial'] . '</td>';
                                echo '<td style="display:none;" id=' . 'idEtiquetaLibro' . '>' . $row['Etiquetas_idEtiqueta'] . '</td>';
                                echo '</tr>';
                                //echo '<td style="display:none;" id=' . 'fechaDeRegistro' . '>' . sprintf("%04s-%02s-%02s", substr($row['fechaDeRegistro'],0,4),substr($row['fechaDeRegistro'],5,2),substr($row['fechaDeRegistro'],8,2)) . '</td>';
                                $i++;
                            }
                            mysql_close($link);
                            ?>
                        </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-default" id="openEditarLibro" >Editar Libro</button>
                    <p></p>
                    <button type="button" class="btn btn-danger" id="openEliminarLibro">Eliminar Libro</button> 
                    <p></p>
                   
                </div>
            </div> <!-- /row -->
        </div><!-- /container -->
    </body>
</html>