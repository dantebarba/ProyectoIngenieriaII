<?php

function addAutor() {
    include 'dbconnection.php';
    $link = connectdb();
    include 'queries.php';
    $nom= $_POST['inputNombre'];
    q_addAutor($link, $nom);
}

//if(isset($_POST['post']))
///
 addAutor();
//} 