<?php
    if (filter_input(INPUT_GET, 'mode') == 'logout'){
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        die();
    }
    
include 'dbconnection.php'; 

$user = filter_input(INPUT_POST, 'user');
$pass = filter_input(INPUT_POST, 'password');

$link = connectdb();

include 'queries.php';

$rows = q_getusuario($user) or die('Error en la consulta a la base de datos' . mysql_error());

$resultado = mysql_fetch_assoc($rows);


if (mysql_num_rows($rows) == 0) {
    mysqli_close($link);
    //JavaScript redirect on click, no es la forma correcta peeeroo anda.
    echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Usuario no encontrado')
            window.location.href='/index.php';
            </SCRIPT>");
    die('you should be gone by now');
}
elseif  ($user == $resultado['username'] and $pass == $resultado['password']) {
    session_start();
    $_SESSION['status'] = 'logged';
    $_SESSION['user'] = $user;
    if ($resultado['isAdmin']) {
        header("Location: admincp.php");
        $_SESSION['type'] = 'admin';
        mysqli_close($link);
    }
    else {
        mysqli_close($link);
        // por ahora te manda al index, hay que ver como hacemos la parte de
        // usuario registrado
        header("Location: index.php");
        }
    die();
} else {
    //die('Contraseña incorrecta - <a href="' . 'http://' . filter_input(INPUT_SERVER, 'HTTP_HOST') . '/index.php' . '">reintentar</a>');
    mysqli_close($link);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Contraseña incorrecta')
            window.location.href='/index.php';
            </SCRIPT>");
    die();
}



