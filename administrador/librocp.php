<?php
if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}

include '../dbconnection.php';
include '../queries.php';


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

function updateLibro($dataCollection) {
    $database = connectdb();
    q_updateLibro($dataCollection);
    q_linkAutorToLibro($dataCollection['idAutor'], $dataCollection['ISBN']);
    q_linkEditorialToLibro($dataCollection['idEditorial'], $dataCollection['ISBN']);
    q_linkCategoriaToLibro($dataCollection['idEtiqueta'], $dataCollection['ISBN']);
    mysql_close($database);
}

function delLibro($dataCollection) {
    $database = connectdb();
    q_removeLibro($dataCollection['ISBN']);
    mysql_close($database);
}

$element = $_POST["elemente"];

switch ($element) {
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
           $dataCollection['descripcion'] = $_POST['inputDescripcion'];
            addLibro($dataCollection);
            header('Location: admincp.php');
            break;
        }
    case 'libro_edit': {
            $dataCollection['ISBN'] = $_POST['editISBN'];
            $dataCollection['titulo'] = $_POST['editTitulo'];
            $dataCollection['paginas'] = $_POST['editPaginas'];
            $dataCollection['precio'] = $_POST['editPrecio'];
            $dataCollection['idioma'] = $_POST['editIdioma'];
            $dataCollection['fecha'] = $_POST['editFecha'];
            $dataCollection['descripcion'] = $_POST['editDescripcion'];
            $dataCollection['idAutor'] = $_POST['editLinkAutor'];
            $dataCollection['idEditorial'] = $_POST['editLinkEditorial'];
            $dataCollection['idEtiqueta'] = $_POST['editLinkEtiqueta'];
            updateLibro($dataCollection);
            header('Location: listarLibro.php');
            break;
        }
    case 'libro_del': {
            $dataCollection['ISBN'] = $_POST['deleteISBN'];
            delLibro($dataCollection);
            header('Location: listarLibro.php');
            break;
        }
}
exit();


?>