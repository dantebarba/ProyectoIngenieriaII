<?php
<<<<<<< HEAD

if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}
/*
  // NO PONER ID's IGUALES A DOS OBJETOS HTML

 */
=======
>>>>>>> 128fadcf92579fd2d4b4a69c54f2f3bf910732d9

function addAutor($nombre) {
    echo 'llego';
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
echo $element;
switch ($element) {
    case 'autor_add': {
        echo 'adentrodelCase';
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
//TODO: POR QUE CARAJO CUANDO LLAMO AL FORM NO ME FIGURA ISSET, PERO CUANDO
// LLAMO AL CAMPO SI? ES POR JAVASCRIPT? TENGO QUE TIRARLE UN TRIGGER?
//if (isset($_POST["inputDataAutor"])) {
  //  addAutor($_POST['agregar_nombreAutor']);
    //header('Location: admincp.php');
//    exit();
//} elseif (isset($_POST["editar_idAutor"])) {
//    updateAutor($_POST['editar_idAutor'], $_POST['editar_nombreAutor']);
//    header('Location: listarAutor.php');
//    exit();
//} elseif (isset($_POST["eliminar_idAutor"])) { // button name
//    delAutor($_POST['eliminar_idAutor']);
//    header('Location: listarAutor.php');
//    exit();
//}

<<<<<<< HEAD
// NO PONER ID's IGUALES A DOS OBJETOS HTML
// NO PONER ID's IGUALES A DOS OBJETOS HTML

=======
>>>>>>> 128fadcf92579fd2d4b4a69c54f2f3bf910732d9

