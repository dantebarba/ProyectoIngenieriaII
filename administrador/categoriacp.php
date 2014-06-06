<?php
if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}
function addEtiqueta($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!isPresentEtiqueta($nombre)) {
        q_addCategoria($nombre);
    }
    else {
        // ALERT MESSAGE
    }
    mysql_close($link);
}

function updateEtiqueta($id, $nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!isPresentEtiqueta($nombre)) {
        q_updateCategoria($id, $nombre);
    }
    else {
        // ALERT MESSAGE
    }
    mysql_close($link);
}

function delEtiqueta($id, $nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeCategoria($id, $nombre);
    mysql_close($link);
}

$element = $_POST["element"];
switch ($element) {
    case 'Etiqueta_add': {
        addEtiqueta($_POST['agregar_nombreEtiqueta']);
        header('Location: admincp.php');
        break;
        }
    case 'Etiqueta_edit': {
        updateEtiqueta($_POST['editar_idEtiqueta'], $_POST['editar_nombreEtiqueta']);
        header('Location: listarCategoria.php');
        }
    case 'Etiqueta_del': {
        delEtiqueta($_POST['eliminar_idEtiqueta']);
        header('Location: listarCategoria.php');
        }
}
exit();

?>