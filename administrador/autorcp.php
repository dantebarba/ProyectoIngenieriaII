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

//TODO: POR QUE CARAJO CUANDO LLAMO AL FORM NO ME FIGURA ISSET, PERO CUANDO
// LLAMO AL CAMPO SI? ES POR JAVASCRIPT? TENGO QUE TIRARLE UN TRIGGER?
if (isset($_POST["inputDataAutor"])) {
    addAutor($_POST['agregar_nombreAutor']);
    header('Location: admincp.php');
    exit();
}
elseif (isset($_POST["editar_idAutor"])) {
    updateAutor($_POST['editar_idAutor'], $_POST['editar_nombreAutor']);
    header('Location: listarAutor.php');
    exit();
} elseif (isset($_POST["eliminar_idAutor"])){ // button name
    delAutor($_POST['eliminar_idAutor']); 
    header('Location: listarAutor.php');
    exit();
}


