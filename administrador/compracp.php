<?php
if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}

include '../dbconnection.php';
include '../queries.php';

/*
function addLibro($dataCollection) {
    $database = connectdb();
    if (!q_isPresentLibro($dataCollection['ISBN'])) {
        q_addLibro($dataCollection);
        q_linkAutorToLibro($dataCollection['idAutor'], $dataCollection['ISBN']);
        q_linkEditorialToLibro($dataCollection['idEditorial'], $dataCollection['ISBN']);
        q_linkCategoriaToLibro($dataCollection['idEtiqueta'], $dataCollection['ISBN']);
    }
    else if (!q_isDisponibleLibro($dataCollection['ISBN'])) {
        q_enableLibro($dataCollection['ISBN']);
        q_updateLibro($dataCollection);
        q_linkAutorToLibro($dataCollection['idAutor'], $dataCollection['ISBN']);
        q_linkEditorialToLibro($dataCollection['idEditorial'], $dataCollection['ISBN']);
        q_linkCategoriaToLibro($dataCollection['idEtiqueta'], $dataCollection['ISBN']);
    }
    else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Ya existe el Libro');window.location.href=
           '/administrador/admincp.php';
            </SCRIPT>");
    }
    mysql_close($database);
}
*/

function updateCompra($dataCollection) {
    $database = connectdb();
    q_updateCompra($dataCollection);
    mysql_close($database);
}

function delCompra($dataCollection) {
    $database = connectdb();
    q_removeCompra($dataCollection['idCompra']);
    mysql_close($database);
}

$element = $_POST["elemente"];

switch ($element) {
    /*
    case 'libro_add': {
            $dataCollection['ISBN'] = $_POST['inputISBN'];
            $dataCollection['titulo'] = $_POST['inputTitulo'];
            $dataCollection['paginas'] = $_POST['inputPaginas'];
            $dataCollection['precio'] = $_POST['inputPrecio'];
           $dataCollection['idioma'] = $_POST['inputIdioma'];
            $dataCollection['fecha'] = $_POST['inputFecha'];
           $dataCollection['idAutor'] = $_POST['inputLinkAutor'];
           $dataCollection['idEditorial'] = $_POST['inputLinkEditorial'];
           $dataCollection['idEtiqueta'] = $_POST['inputLinkEtiqueta'];
            addLibro($dataCollection);
            header('Location: admincp.php');
            break;
        }
     * 
     */
    case 'compra_edit': {
            $dataCollection['idCompra'] = $_POST['editIdCompra'];
           // $dataCollection['ISBN'] = $_POST['editISBN'];
           // $dataCollection['titulo'] = $_POST['editTitulo'];
            $dataCollection['estado'] = $_POST['editEstado'];
            updateCompra($dataCollection);
            header('Location: listarCompras.php');
            break;
        }
    case 'compra_del': {
            $dataCollection['idCompra'] = $_POST['deleteIdCompra'];
            delCompra($dataCollection);
            header('Location: listarCompras.php');
            break;
        }
}
exit();


?>