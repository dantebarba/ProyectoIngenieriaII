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

function delAutor($id) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeAutor($id);
    mysql_close($link);
}


if (isset($_POST["inputDataAutor"])) {
    addAutor($_POST['inputAutor']);
    header('Location: admincp.php');
    exit();
}
elseif (isset($_POST["editDataAutor"])) {
    updateAutor($_POST['idAutor'], $_POST['editNombre']);
    header('Location: listarAutor.php');
    exit();
} elseif (isset($_POST["deleteDataAutor"])){ // button name
    delAutor($_POST['idAutor']); 
    header('Location: listarAutor.php');
    exit();
}


