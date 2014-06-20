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
    //session_start();
    /* voy a tener que usar Cookies porque el servidor no
     * me permite usar session, puede que haya un problema de permisos
     * o que la session se cancele por orden del servidor
     */
    setcookie('username', $resultado['username'], time()+3600);
    setcookie('password', $resultado['password'], time()+3600);
//    $_SESSION['status'] = 'logged';
//    $_SESSION['user'] = $user;
    if ($resultado['isAdmin']) {
        setcookie('isAdmin', $resultado['isAdmin'], time()+3600);
        header("Location: administrador/admincp.php");
//        $_SESSION['type'] = 'admin';
        mysqli_close($link);
    }
    else {
        mysqli_close($link);
        // por ahora te manda al index, hay que ver como hacemos la parte de
        // usuario registrado
        header("Location: index.php");
        }
    exit();
} else {
    //die('Contraseña incorrecta - <a href="' . 'http://' . filter_input(INPUT_SERVER, 'HTTP_HOST') . '/index.php' . '">reintentar</a>');
    mysqli_close($link);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Contraseña incorrecta')
            window.location.href='/index.php';
            </SCRIPT>");
    die();
}



