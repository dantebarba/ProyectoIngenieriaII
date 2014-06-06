<?php

if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}

function addEditorial($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_addEditorial($nombre);
    mysql_close($link);
}

function updateEditorial($id, $nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_updateEditorial($id, $nombre);
    mysql_close($link);
}

function delEditorial($id) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeEditorial($id);
    mysql_close($link);
}
$element = $_POST["elemente"];
switch ($element) {
    case 'editorial_add': {
            addEditorial($_POST['agregar_nombreEditorial']);
            header('Location: admincp.php');
            break;
        }
    case 'editorial_edit': {
            updateEditorial($_POST['editar_idEditorial'], $_POST['editar_nombreEditorial']);
            header('Location: listarEditorial.php');
            break;
        }
    case 'editorial_del': {
            delEditorial($_POST['eliminar_idEditorial']);
            header('Location: listarEditorial.php');
            break;
        }
}
exit();

?>