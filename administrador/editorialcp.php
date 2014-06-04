<?php
if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}
function addEditorial($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_addEditorial($nombre);
    mysql_close($link);
}

function updateEditorial($id) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_updateEditorial($id);
    mysql_close($link);
}

function delEditorial($id) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeEditorial($id);
    mysql_close($link);
}


if (isset($_POST["inputDataEditorial"])) { // Para agregar
    addEditorial($_POST['inputEditorial']);
    header('Location: admincp.php');
    exit();
}
elseif (isset($_POST["editDataEditorial"])) { // Para editar
    updateEditorial($_POST['idEditorial'], $_POST['nombreEditorial']);
    header('Location: listarEditorial.php');
    exit();
} 
elseif (isset($_POST["deleteDataEditorial"])){ // para borrar
        //$unNom= 'ana';
        delEditorial($_POST["idEditorial"]); 
        exit;
}