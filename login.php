<!DOCTYPE html>
<?php
    if (filter_input(INPUT_GET, 'mode') == 'logout'){
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        die();
    }
    
$user = filter_input(INPUT_POST, 'user');
$pass = filter_input(INPUT_POST, 'password');

include 'dbconnection.php';
$link = connectdb();
$result = mysql_query("SELECT * FROM usuarios") or die('Error en la consulta a la base de datos');
$row = mysqli_fetch_assoc($result);
if ($row == NULL) {
    die('No existe ese usuario - <a href="' . 'http://' . filter_input(INPUT_SERVER, 'HTTP_HOST') . '/admin.php' . '">reintentar</a>');
}

if ($user == $row['username'] and $pass == $row['password']) {
    session_start();
    $_SESSION['status'] = 'logged';
    $_SESSION['user'] = $user;
    header("Location: busqueda.php");
    die();
} else {
    die('Contraseña incorrecta - <a href="' . 'http://' . filter_input(INPUT_SERVER, 'HTTP_HOST') . '/admin.php' . '">reintentar</a>');
}

mysqli_close($link);
