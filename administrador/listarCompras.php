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

        <title>Listado de Compras</title><!-- Bootstrap core CSS -->
        <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script src='/js/modalFunctions.js' type='text/javascript'></script>
        <script src='/js/notifications.js' type='text/javascript'></script>
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
                var fields = ['idCompra','titularTarjeta', 'precioCompra' ,'fechaCompra', 'envio', 'estado' , 'ISBN', 'tituloLibro',
                    'idAutorLibro', 'idEditorialLibro', 'idEtiquetaLibro', 'usuarioDNI', 'usuarioUsername'];
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
                $(document).on("click", "#openEditarCompra", function() {
                    $(".modal-body #editIdCompra").val(item['idCompra']);
                    $(".modal-body #editISBN").val(item['ISBN']);
                    $(".modal-body #editTitulo").val(item['tituloLibro']);
                    $(".modal-body #editEstado").val(item['estado']);
                    $(".modal-body #editTitular").val(item['titularTarjeta']);
                    $('#editarCompra').modal("show");
                    
                    // anda okey
                    //As pointed out in comments, 
                    //it is superfluous to have to manually call the modal.
                    // $('#addBookDialog').modal('show');
                });
                 $(document).on("click", "#openEliminarCompra", function() {
                    $(".modal-body #deleteIdCompra").val(item['idCompra']);
                    $(".modal-body #deleteISBN").val(item['ISBN']);
                    $(".modal-body #deleteTitulo").val(item['tituloLibro']);
                    $("#eliminarCompra").modal('show');
                });
            });
        </script>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://ingenieriaii.url.ph/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="http://ingenieriaii.url.ph/css/custom.css" rel="stylesheet" type="text/css" />

    </head>

    <?php include_once 'modalLibro.php' ?>
    <?php include_once 'modalAutor.php' ?>
    <?php include_once 'modalEditorial.php' ?>
    <?php include_once 'modalCategoria.php' ?>
    <?php include_once 'modalCompra.php' ?>
    <?php include_once '../header.php' ?>
    <body id="listarBody">

        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <form class="form-horizontal" id="listarCompras" method="post" action="listarCompras.php" role="form"> 
                    <button type='submit'class="btn btn-primary" onclick="redirect('listarCompras.php')">Listar Entre Fechas</button><p></p>
                        <input type="date" class="form-control" id="fecha1Compra" name="fecha1Compra"><p></p>
                        <input type="date" class="form-control" id="fecha2Compra" name="fecha2Compra"><p></p>
                      
                        
                    </form>
                </div> 
                <div class="col-md-8">
                  <div  style="height:400px;overflow:auto;">
                    <table class="table table-hover table-bordered table-striped" id="lista">
                        <thead>
                            <tr>
                                <th>Id Compra</th>
                                <th>ISBN Libro</th>
                                <th>Titulo</th>
                                <th>Precio</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Usuario DNI</th>
                                <th>Username</th>
                                <th>Titular Tarjeta</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include_once '../dbconnection.php';
                            $link = connectdb();
                            include_once '../queries.php';
                            
                            $i = 0;
                            $id = 'row' . $i;
                       
                            if (isset($_POST['fecha1Compra']) && isset($_POST['fecha2Compra'])) {
                                $fecha1 = $_POST['fecha1Compra'];
                                $fecha2 = $_POST['fecha2Compra'];
                                if (($fecha1 != "") && ($fecha2 != "")) {
                                    $result = q_listComprasBetween($fecha1,$fecha2);
                                    
                                }
                                else {$result = q_listCompras();}
                            }
                            else {
                                $result = q_listCompras();
                            }                              
                        
                            
                            while ($row = mysql_fetch_array($result)) {
                                //Print out the contents of the entry 
                                echo '<tr id=' . $id . ' tabindex=' . $i . '>';
                                echo '<td id=' . 'idCompra' . '>' . $row['Compras_idCompra'] . '</td>';
                                
                                echo '<td id=' . 'ISBN' . '>' . $row['ISBN'] . '</td>';
                                echo '<td id=' . 'tituloLibro' . '>' . $row['titulo'] . '</td>';
                                echo '<td id=' . 'precioCompra' . '>' . $row['precio'] . '</td>';
                                echo '<td id=' . 'fechaCompra' . '>' . $row['fecha'] . '</td>';
                                echo '<td id=' . 'estado' . '>' . $row['estado'] . '</td>';
                               
                                echo '<td style="display:none;" id=' . 'idAutorLibro' . '>' . $row['Autores_idAutor'] . '</td>';
                                echo '<td style="display:none;" id=' . 'idEditorialLibro' . '>' . $row['Editoriales_idEditorial'] . '</td>';
                                echo '<td style="display:none;" id=' . 'idEtiquetaLibro' . '>' . $row['Etiquetas_idEtiqueta'] . '</td>';
                                echo '<td id=' . 'usuarioDNI' . '>' . $row['Usuarios_DNI'] . '</td>';
                                echo '<td id=' . 'usuarioUsername' . '>' . $row['Usuarios_username'] . '</td>';
                                echo '<td id=' . 'titularTarjeta' . '>' . $row['titular'] . '</td>';
                                $i++;
                            }
                            mysql_close($link);
                            ?>
                        </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-default" id="openEditarCompra" >Editar Compra</button>
                    <p></p>
                    <button type="button" class="btn btn-danger" id="openEliminarCompra">Eliminar Compra</button> 
                </div>
            </div> <!-- /row -->
        </div><!-- /container -->
    </body>
</html>