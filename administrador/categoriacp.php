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


//if (isset($_POST["inputDataEditorial"])) { // Para agregar
//   addCategoria($_POST['inputCategoria']);
//    header('Location: admincp.php');
//    exit();
//}
//elseif (isset($_POST["editDataCategoria"])) { // Para editar
//    updateEditorial($_POST['idCategoria'], $_POST['nombreCategoria']);
//    header('Location: listarCategoria.php');
//    exit();
//} 
//elseif (isset($_POST["deleteDataCategoria"])){ // para borrar
//        //$unNom= 'ana';
//        delEditorial($_POST["idCategoria"]); 
//        exit;
//}
?>