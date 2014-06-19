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
        $dataCollection['numDepto'] = $_POST['registrarNumDepto'];
        
        include 'queries.php';
        
        (q_addUsuario($dataCollection) and
        q_addDireccion($dataCollection) and
        q_linkUsuarioToDireccion(q_lastID(), $dataCollection['username'], $dataCollection['DNI'])) or die(mysqli_error());
        
        
    }
    
    else { // ESTARIA BUENO HACER UN JSON RETURN PARA TIRAR ERROR 
    }
   mysqli_close($database);
?>
