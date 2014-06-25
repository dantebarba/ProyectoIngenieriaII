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
    
include 'dbconnection.php'; 

$user = filter_input(INPUT_POST, 'user');
$pass = filter_input(INPUT_POST, 'password');
$link = connectdb();


include 'queries.php';

$rows = q_getUsuario($user) or die('Error en la consulta a la base de datos' . mysql_error());

$resultado = mysql_fetch_assoc($rows);


if ((mysql_num_rows($rows) != 0) && ($user == $resultado['username'] and $pass == $resultado['password'])) {
    //JavaScript redirect on click, no es la forma correcta peeeroo anda.

    
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
            mysqli_close($link);
            // por ahora te manda al index, hay que ver como hacemos la parte de
            // usuario registrado
            $response['redirect'] = '/index.php';
            header('Content-type: application/json');
            echo json_encode($response);
            }
        exit();
    

} 
else {
    //die('Contraseña incorrecta - <a href="' . 'http://' . filter_input(INPUT_SERVER, 'HTTP_HOST') . '/index.php' . '">reintentar</a>');
    mysqli_close($link);
    $response['status'] = 'error_invalidLogin';
    $response['message'] = '<strong>ERROR:</strong> Username o password incorrectos';
    header('Content-type: application/json');
    echo json_encode($response);
    die();
}


