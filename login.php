<?php
    if (filter_input(INPUT_GET, 'mode') == 'logout'){
        if (isset($_COOKIE['username'])) {
            unset($_COOKIE['username']);
            setcookie('username', '', 1); // empty value and old timestamp
            unset($_COOKIE['password']);
            setcookie('password', '', 1);
        }
        if (isset($_COOKIE['isAdmin'])) {
            unset($_COOKIE['isAdmin']);
            setcookie('isAdmin', '', 1);
        }
        header("Location: index.php");
        exit();
    }
    else if (filter_input(INPUT_GET, 'mode') == 'enableaccount') {
        include 'dbconnection.php'; 
        $link = connectdb();
        include 'queries.php';
        $field['username'] = $_GET['recoverUsername'];
        if ($_GET['recoverDNI'] == '') {
            $field['dni'] = "NULL";
        }
        else {
            $field['dni'] = $_GET['recoverDNI'];
        }
        $query = q_isPresentUsuario($field['username'], $field['dni']);
        if ($query) {
            q_enableUsuario($field['username'], $field['dni']);
            $response['status'] = 'success';
            $response['message'] = 'Se ha habilitado el usuario';
            $response['redirect'] = '/index.php';
            header('Content-type: application/json');
            echo json_encode($response); 
        }
        else {
           $response['status'] = 'error_invalidLogin';
           $response['message'] = '<strong>ERROR:</strong> Username/DNI invalido';
           header('Content-type: application/json');
           echo json_encode($response); 
           
        }
        exit();
    }
    else if (filter_input(INPUT_GET, 'mode') == 'passwordrecover') { // aqui se encuentra el procedimiento de recuperar password};
        exit();
    }
    
include 'dbconnection.php'; 

$user = filter_input(INPUT_POST, 'user');
$pass = filter_input(INPUT_POST, 'password');
$link = connectdb();


include 'queries.php';

$rows = q_getUsuario($user) or die('Error en la consulta a la base de datos' . mysql_error());

$resultado = mysql_fetch_assoc($rows);


if ((mysql_num_rows($rows) != 0) && ($user == $resultado['username'] and $pass == $resultado['password'])) {
    if (!q_isDisponibleUsuario($user)) {
        $respuesta['status'] = 'error_userDisabled'; 
        $respuesta['message'] = '<strong>ERROR:</strong> El Usuario ya existe pero se encuentra deshabilitado.'
                    . 'Para habilitarlo haga click <a href="/recover.php"><strong>aqui</strong></a>';
        header('Content-type: application/json');
        echo json_encode($respuesta);
        mysql_close($link);
        exit();
    }
    else {
        //session_start();
        /* voy a tener que usar Cookies porque el servidor no
         * me permite usar session, puede que haya un problema de permisos
         * o que la session se cancele por orden del servidor
         */
        setcookie('username', $resultado['username'], time()+3600);
        setcookie('password', $resultado['password'], time()+3600);
    //    $_SESSION['status'] = 'logged';
    //    $_SESSION['user'] = $user;
        $response['status'] = 'success';
        if ($resultado['isAdmin']) {
            mysql_close($link);
            setcookie('isAdmin', $resultado['isAdmin'], time()+3600);
            $response['redirect'] = '/administrador/admincp.php';
            header('Content-type: application/json');
            echo json_encode($response);
    //        $_SESSION['type'] = 'admin';
        }
        else {
            mysql_close($link);
            // por ahora te manda al index, hay que ver como hacemos la parte de
            // usuario registrado
            $response['redirect'] = '/index.php';
            header('Content-type: application/json');
            echo json_encode($response);
            }
        exit();
    }

} 
else {
    //die('Contraseña incorrecta - <a href="' . 'http://' . filter_input(INPUT_SERVER, 'HTTP_HOST') . '/index.php' . '">reintentar</a>');
    mysql_close($link);
    $response['status'] = 'error_invalidLogin';
    $response['message'] = '<strong>ERROR:</strong> Username o password incorrectos';
    header('Content-type: application/json');
    echo json_encode($response);
    die();
}


