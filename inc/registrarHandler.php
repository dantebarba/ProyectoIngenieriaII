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

            if ($dataCollection['departamento'] == '1') {
                $dataCollection['numDpto'] = $_POST['registrarDepartamento'];
            }
            else {
                $dataCollection['numDpto'] = "NULL";
            }
            if ($dataCollection['tel_cel'] === ''){
                $dataCollection['tel_cel'] = "NULL";
            }
            else if ($dataCollection['tel_fijo'] === '') {
                $dataCollection['tel_fijo'] = "NULL";
            }

            q_addUsuario($dataCollection);
            q_addDireccion($dataCollection);
            q_linkUsuarioToDireccion(mysql_insert_id(), $dataCollection['username'], $dataCollection['DNI']);

            $respuesta['status'] = 'success'; 
            $respuesta['message'] = 'Gracias por registrarse <strong>'.$dataCollection['username'].'!</strong>';
            header('Content-type: application/json');
            echo json_encode($respuesta);
    }
    else 
        if (!q_isDisponibleUsuarioPorDNI(filter_input(INPUT_POST, 'registrarDNI')) or !q_isDisponibleUsuario(filter_input(INPUT_POST, 'registrarUsername'))) {
        // revisamos si el usuario no esta disponible (fue eliminado) por DNI o por username
            $respuesta['status'] = 'error_userDisabled'; 
            $respuesta['message'] = '<strong>ERROR:</strong> El Usuario ya existe pero se encuentra deshabilitado.'
                    . 'Para habilitarlo haga click <a href="/recover.php"><strong>aqui</strong></a>;';
            header('Content-type: application/json');
            echo json_encode($respuesta);
        }
    else {
        $respuesta['status'] = 'error_userExists'; 
        $respuesta['message'] = '<strong>ERROR:</strong> El Usuario ya existe';
        header('Content-type: application/json');
        echo json_encode($respuesta);
        
    }
   mysql_close($database);
   exit();
?>
