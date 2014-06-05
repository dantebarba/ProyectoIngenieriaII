<?php

function addAutor($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_addAutor($nombre);
    mysql_close($link);
}

function updateAutor($id, $nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_updateAutor($id, $nombre);
    mysql_close($link);
}

function delAutor($id) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeAutor($id);
    mysql_close($link);
}

$element = $_POST["element"];
switch ($element) {
    case 'autor_add': {
        addAutor($_POST['agregar_nombreAutor']);
        header('Location: admincp.php');
        break;
        }
    case 'autor_edit': {
        updateAutor($_POST['editar_idAutor'], $_POST['editar_nombreAutor']);
        header('Location: listarAutor.php');
        }
    case 'autor_del': {
        delAutor($_POST['eliminar_idAutor']);
        header('Location: listarAutor.php');
        }
}
exit();

?>