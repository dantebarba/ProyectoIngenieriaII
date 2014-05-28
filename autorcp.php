<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addAutor($name) {
    include 'dbconnection.php';
    $link = connectdb();
    include 'queries.php';
    q_addAutor($link, $name);
}

if(isset($_POST["inputNombre"])) {
    addAutor($_POST['inputNombre']);
}



