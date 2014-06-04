<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

function delAutor($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeAutor($nombre);
    mysql_close($link);
}


if (isset($_POST["inputDataAutor"])) { // para agregar autor
    addAutor($_POST['inputAutor']);
    header('Location: admincp.php');
    exit();
}
elseif (isset($_POST["editDataAutor"])) { // para actualizar autor
    updateAutor($_POST['idAutor'], $_POST['editNombre']);
    header('Location: listarAutor.php');
    exit();
} elseif (isset($_POST["deleteDataAutor"])){ // para borrar autor
        //$unNom= 'ana';
        q_delAutor($_POST["idAutor"]);  
        exit;
 }


