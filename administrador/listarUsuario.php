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
               <div class="col-md-2"></div> 
                    <div class="col-md-8">
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
                                $fecha1 = $_POST["fecha1Usuario"];
                                $fecha2 = $_POST["fecha2Usuario"];
                                if (($fecha1 === "") || ($fecha2 === "")){
                                    $result = q_listUsuarios() or die('Error en la consulta a la base de datos' . mysql_error());
                                }
                                else {
                                    $result = q_listUserBetween($fecha1,$fecha2) or die ('Error en la consulta a la base de datos' . mysql_error());
                                }    
                                    while ($row = mysql_fetch_array($result)) {
                                        echo '<tr id=' . $id . ' tabindex=' . $i . '>';
                                        echo '<td id=' . 'username' . '>' . $row['username'] . '</td>';
                                        echo '<td id=' . 'dni' . '>' . $row['DNI'] . '</td>';
                                        echo '<td id=' . 'fecha_registrado' . '>' . $row['fecha_registrado'] . '</td>';
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
                    </div>
                </div>
            </div>
    </body>
</html>