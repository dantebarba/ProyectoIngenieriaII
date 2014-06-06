<?php
if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}
function addCategoria($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_addCategoria($nombre);
    mysql_close($link);
}

function updateEditorial($id) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_updateCategoria($id);
    mysql_close($link);
}

function delEditorial($id) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeCategoria($id);
    mysql_close($link);
}

$element = $_POST["element"];
switch ($element) {
    case 'Etiqueta_add': {
        addAutor($_POST['agregar_idEtiqueta'], $_POST['agregar_nombreEtiqueta']);
        header('Location: admincp.php');
        break;
        }
    case 'Etiqueta_edit': {
        updateAutor($_POST['editar_idEtiqueta'], $_POST['editar_nombreEtiqueta']);
        header('Location: listarAutor.php');
        }
    case 'Etiqueta_del': {
        delAutor($_POST['eliminar_idEtiqueta']);
        header('Location: listarAutor.php');
        }
}
exit();

?>