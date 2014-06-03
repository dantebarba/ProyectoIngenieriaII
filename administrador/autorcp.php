<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addAutor($name) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_addAutor($link, $name);
    mysql_close($link);
}

function updateAutor($id, $nombre) {
    include '../dbconnection.php';
    $link = connectdb();
    include '../queries.php';
    q_updateAutor($id, $nombre);
    mysql_close($link);
}


if(isset($_POST["inputNombre"])) {
    addAutor($_POST['inputNombre']);
    header('Location: admincp.php');
}
elseif (isset($_POST["idAutor"])) {
    updateAutor($_POST['idAutor'], $_POST['editNombre']);
    header('Location: listarAutor.php');
}


