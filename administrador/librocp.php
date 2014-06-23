<?php

if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}

function addLibro($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!q_isPresentLibro($nombre)) {
        q_addLibro($nombre);
    }
    else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Ya existe la Editorial');window.location.href=
           '/administrador/admincp.php';
            </SCRIPT>");
    }
    mysql_close($link);
}

function updateEditorial($id, $nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!q_isPresentEditorial($nombre, $id)) {
        q_updateEditorial($id, $nombre);
    }
    else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Ya existe la Editorial');window.location.href=
           '/administrador/listarLibro.php';
            </SCRIPT>");
    }
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
        $datos['ISBN']=inputISBN;
        $datos['titulo']=inputTitulo;
        $datos['idAutor']=inputAutor;
        $datos['idEditorial']=inputEditorial;
        $datos['paginas']=inputPaginas;
        $datos['precio']=inputPrecio;
        $datos['idioma']=inputIdioma;
        $datos['fecha']=inputFecha
        addEditorial($datos);
        header('Location: admincp.php');
        break;
    }
    case 'editorial_edit': {
        $datos['ISBN']=editISBN;
        $datos['titulo']=editTitulo;
        $datos['idAutor']=editAutor;
        $datos['idEditorial']=editEditorial;
        $datos['paginas']=editPaginas;
        $datos['precio']=editPrecio;
        $datos['idioma']=editIdioma;
        $datos['fecha']=editFecha
        updateEditorial($datos);
        header('Location: listarEditorial.php');
        break;       
    }
    case 'editorial_del': {
        delEditorial($_POST['delISBN']);
        header('Location: listarEditorial.php');
        break;
    }
}
exit();

?>