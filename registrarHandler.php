<?php
// MAIN REGISTER HANDLER
    include 'dbconnection.php';
    $database = connectdb();
    include 'queries.php';
    if (!q_isPresentUsuario($_POST['registrarUsername'], $_POST['registrarDNI'])) {
        // WORK REGISTRATION HERE
        $dataCollection['username'] = $_POST['registrarUsername'];
        $dataCollection['password'] = $_POST['registrarPassword'];
        $dataCollection['DNI'] = $_POST['registrarDNI'];
        $dataCollection['tel_fijo'] = $_POST['registrarTel_fijo'];
        $dataCollection['tel_cel'] = $_POST['registrarTel_cel'];
        $dataCollection['genero'] = $_POST['registrarGenero'];
        $dataCollection['email'] = $_POST['registrarEmail'];
        $dataCollection['isAdmin'] = 0;
        $dataCollection['fecha_nac'] = date('Y-m-d', strtotime($_POST['registrarFecha_nac']));
        // DIRECCION
        
        $dataCollection['calle'] = $_POST['registrarCalle'];
        $dataCollection['localidad'] = $_POST['registrarLocalidad'];
        $dataCollection['numero'] = $_POST['registrarNumero'];
        $dataCollection['provincia'] = $_POST['registrarProvincia'];
        $dataCollection['departamento'] = $_POST['registrarIsDpto'];
        
        if ($dataCollection['departamento'] == 1) {
            $dataCollection['numDpto'] = $_POST['registrarDepartamento'];
        }
        else {
            $dataCollection['numDpto'] = "NULL";
        }
        
        q_addUsuario($dataCollection);
        q_addDireccion($dataCollection);
        q_linkUsuarioToDireccion(mysql_insert_id(), $dataCollection['username'], $dataCollection['DNI']);
        
        echo '{ "message": "Gracias por registrarse" }';
    }
    
    else {
        echo '{ "message": "ERROR: El usuario ya existe" }';
    }
   mysql_close($database);
?>
