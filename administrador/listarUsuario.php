<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <title>Listado de Usuarios</title>    
        <link href="" rel="shortcut icon">
        <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://ingenieriaii.url.ph/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="http://ingenieriaii.url.ph/css/custom.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
    include '../header.php';
    ?>
    <body id="listarbody">        
        <div class="container">
            <div class="row">
                <div  style="height:auto;width:auto;overflow:auto;">
                    <table class="table table-hover table-bordered table-striped table-condensed" id="lista">
                        <thead>
                            <tr>
                                <th>Usuarios</th>
                                <th>DNI</th>
                                <th>Fecha Registrado</th>
                                <th>Tel. Fijo</th>
                                <th>Tel. Celular</th>
                                <th>Genero</th>
                                <th>Fecha Nacimiento</th>
                                <th>E-Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../dbconnection.php';
                            $link = connectdb();
                            include '../queries.php';
                            $i = 0;
                            $id = 'row' . $i;
                            if (isset($_POST['fecha1Usuario']) && isset($_POST['fecha2Usuario'])) {
                                $fecha1 = $_POST["fecha1Usuario"];
                                $fecha2 = $_POST["fecha2Usuario"];
                                if (($fecha1 != "") && ($fecha2 != "")) {
                                    $result = q_listUserBetween($fecha1, $fecha2) or die('Error en la consulta a la base de datos' . mysql_error());                                    
                                }
                            } else {
                                $result = q_listUsuarios() or die('Error en la consulta a la base de datos' . mysql_error());

                            }
                            while ($row = mysql_fetch_array($result)) {
                                echo '<tr id=' . $id . ' tabindex=' . $i . '>';
                                echo '<td id=' . 'username' . '>' . $row['username'] . '</td>';
                                echo '<td id=' . 'dni' . '>' . $row['DNI'] . '</td>';
                                $caca = sprintf("%04s-%02s-%02s", substr($row['fecha_registrado'], 0, 4), substr($row['fecha_registrado'], 5, 2), substr($row['fecha_registrado'], 8, 2));
                                echo '<td id=' . 'fecha_registrado' . '>' . $caca . '</td>';
                                echo '<td id=' . 'tel_fijo' . '>' . $row['tel_fijo'] . '</td>';
                                echo '<td id=' . 'tel_celular' . '>' . $row['tel_cel'] . '</td>';
                                echo '<td id=' . 'genero' . '>' . $row['genero'] . '</td>';
                                echo '<td id=' . 'fecha_nac' . '>' . $row['fecha_nac'] . '</td>';
                                echo '<td id=' . 'email' . '>' . $row['email'] . '</td>';
                                $i++;
                            }
                            mysql_close($link);
                            ?>
                        </tbody>
                    </table>
                </div>  
                    <div class="col-xs-2">
                    <form class="form-horizontal" id="listarLibro" method="post" action="listarUsuario.php" role="form"> 
                        <button type='submit'class="btn btn-primary" onclick="redirect('listarUsuario.php')">Listar Entre Fechas</button><p></p>
                        
                        <input type="date" class="form-control" id="fecha1Usuario" name="fecha1Usuario"><p></p>
                        <input type="date" class="form-control" id="fecha2Usuario" name="fecha2Usuario"><p></p>
                        </div>
                        <span class="help-block">En caso de no ingresar alguna de las dos fechas, se listaran todos los libros</span><p></p>

                    </form>
            </div>
        </div>
    </body>
</html>