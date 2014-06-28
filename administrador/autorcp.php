<?php

function addAutor($nombre, $DNI) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!q_isPresentAutor($DNI)) {
        q_addAutor($nombre, $DNI);
        $response['dni'] = $DNI;
        $response['nombre'] = $nombre;
        $response['message'] = 'Se ha agregado el Autor';
        $response['status'] = 'success';
        $response['id'] = mysql_insert_id();
    }
    else
    {
        if (q_isDisponibleAutorPorDni($DNI)){
            $response['message'] = '<strong>ERROR: Ya existe el autor</strong>';
            $response['status'] = 'error_autorExists';
        } else {
            q_habilitarAutor ($DNI);
        }
       
    }
    
    mysql_close($link);
    header('Content-type: application/json');
    echo json_encode($response);
    exit();
}

function updateAutor($id, $nombre, $DNI) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    if (!q_isPresentAutor($DNI, $id)) {
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