<?php
// MAIN REGISTER HANDLER
    include 'dbconnection.php';
    $database = connectdb();
    if (!q_isPresentUsuario($_POST['registrarUsername'])) {
        // WORK REGISTRATION HERE
        $dataCollection['username'] = $_POST['registrarUsername'];
        $dataCollection['password'] = $_POST['registrarPassword'];
        $dataCollection['DNI'] = $_POST['registrarDNI'];
        $dataCollection['tel_fijo'] = $_POST['registrarTel_fijo'];
        $dataCollection['tel_cel'] = $_POST['registrarTel_cel'];
        $dataCollection['genero'] = $_POST['registrarGenero'];
        $dataCollection['email'] = $_POST['registrarEmail'];
        $dataCollection['isAdmin'] = 0;
        $dataCollection['fecha_nac'] = $_POST['registarFecha_nac'];
        // DIRECCION
        
        $dataCollection['calle'] = $_POST['registrarCalle'];
        $dataCollection['localidad'] = $_POST['registrarLocalidad'];
        $dataCollection['numero'] = $_POST['registrarNumero'];
        $dataCollection['provincia'] = $_POST['registrarProvincia'];
        $dataCollection['departamento'] = $_POST['registrarIsDepto'];
        $dataCollection['numDpto'] = $_POST['registrarNumDpto'];
        
        include 'queries.php';
        
        q_addUsuario($dataCollection);
        q_addDireccion($dataCollection);
        q_linkUsuarioToDireccion(q_lastID(), $dataCollection['username'], $dataCollection['DNI']);
        
        echo '{ "message": Gracias por registrarse }';
    }
    
    else { // ESTARIA BUENO HACER UN JSON RETURN PARA TIRAR ERROR 
        echo '{ "message": ERROR, El usuario ya existe }';
    }
   mysql_close($database);
?>
