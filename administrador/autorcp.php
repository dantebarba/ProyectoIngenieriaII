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

function q_delAutor($nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_removeAutor($nombre);
    mysql_close($link);
}


if (isset($_POST["inputAutor"])) {
    addAutor($_POST['inputAutor']);
    header('Location: admincp.php');
    exit();
}
elseif (isset($_POST["idAutor"])) {
    updateAutor($_POST['idAutor'], $_POST['editNombre']);
    header('Location: listarAutor.php');
    exit();
} elseif (isset($_POST["delAutor"])){ // button name
       
        q_delAutor($_POST['autorNombre']); 
        header('Location: listarAutor.php');
        exit();
       
 }


