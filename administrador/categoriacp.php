<?php
if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}


function addCategoria($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!q_isPresentCategoria($nombre)) {
        q_addCategoria($nombre);
    }
    else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Ya existe la Categoria');window.location.href=
           '/administrador/admincp.php';
            </SCRIPT>");
    }
    mysql_close($link);
}

function updateCategoria($id, $nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!q_isPresentCategoria($nombre)) {
        q_updateCategoria($id, $nombre);
    }
    else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Ya existe la Categoria');window.location.href=
           '/administrador/listarCategoria.php';
            </SCRIPT>");
    }
    mysql_close($link);
}

function delCategoria($id, $nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeCategoria($id, $nombre);
    mysql_close($link);
}

$element = $_POST["element"];
switch ($element) {
    case 'Etiqueta_add': {
        addCategoria($_POST['agregar_nombreEtiqueta']);
        header('Location: admincp.php');
        break;
        }
    case 'Etiqueta_edit': {
        updateCategoria($_POST['editar_idEtiqueta'], $_POST['editar_nombreEtiqueta']);
        header('Location: listarCategoria.php');
        }
    case 'Etiqueta_del': {
        delCategoria($_POST['eliminar_idEtiqueta']);
        header('Location: listarCategoria.php');
        }
}
exit();

?>