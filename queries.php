<?php

function q_addAutor($nombre)
{
    $query="INSERT INTO autores (nombre) VALUES ('$nombre')";
    mysql_query($query) or die(mysql_error());
}
function q_addEditorial ($nombre){
    $query="INSERT INTO editoriales (nombre) VALUES ('$nombre')";
    mysql_query($query) or die(mysql_error());
};
function q_addCategoria ($nombre){
    $query="INSERT INTO etiquetas (nombre) VALUES ('$nombre')";
    mysql_query($query) or die(mysql_error());
};
