<?php

function addAutor($nombre, $DNI) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!q_isPresentAutor($DNI)) {
        q_addAutor($nombre, $DNI);
    }
    else
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Ya existe el Autor');window.location.href=
           '/administrador/admincp.php';
            </SCRIPT>");
    }
    
    mysql_close($link);
}

function updateAutor($id, $nombre, $DNI) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!q_isPresentAutor($DNI)) {
        q_updateAutor($id, $nombre, $DNI);
        
    }
    else
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Ya existe el Autor');window.location.href=
           '/administrador/listarAutor.php';
            </SCRIPT>");
        
    }
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
        addAutor($_POST['agregar_nombreAutor'], $_POST['agregar_DNIAutor']);
        header('Location: admincp.php');
        break;
        }
    case 'autor_edit': {
        updateAutor($_POST['editar_idAutor'], $_POST['editar_nombreAutor'], $_POST['editar_DNIAutor']);
        header('Location: listarAutor.php');
        }
    case 'autor_del': {
        delAutor($_POST['eliminar_idAutor']);
        header('Location: listarAutor.php');
        }
}
exit();

?>