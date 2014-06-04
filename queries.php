<?php

        const database = 'u172127113_ing';

function q_getusuario($nombre) {
    $query = "SELECT * FROM usuarios WHERE username = '$nombre'";
    $row = mysql_query($query) or die(mysql_error());
    return $row;
}

;

function q_getlibro($nombre) {
    
}

;

function q_geteditorial($nombre) {
    
}

;

function q_getautor($nombre) {
    
}

;

function q_getcompra($nombre) {
    
}

;

function q_addAutor($nombre) {
    $query = "INSERT INTO autores (nombre) VALUES ('$nombre')";
    mysql_query($query) or die(mysql_error());
}

function q_addEditorial($nombre) {
    $query = "INSERT INTO editoriales (nombre) VALUES ('$nombre')";
    mysql_query($query) or die(mysql_error());
}

;

function q_addCategoria($nombre) {
    $query = "INSERT INTO etiquetas (nombre) VALUES ('$nombre')";
    mysql_query($query) or die(mysql_error());
}

;

function q_updateAutor($id, $nombre) {
    $query = "UPDATE autores SET nombre='$nombre' WHERE " . $id . "=idAutor";
    mysql_query($query) or die(mysql_error());
}

function q_updateEditorial($id, $nombre) {
    $query = "UPDATE autores SET nombre='$nombre' WHERE " . $id . "=idEditorial";
    mysql_query($query) or die(mysql_error());
}

function q_updateCategoria($id, $nombre) {
    $query = "UPDATE autores SET nombre='$nombre' WHERE " . $id . "=etiqueta";
    mysql_query($query) or die(mysql_error());
}

function q_removeAutor($id) { // elimina el autor segun $ID, no hace
    $query = "DELETE FROM autores WHERE idAutor='$id'";
    mysql_query($query) or die(mysql_error());
}

function q_removeEditorial($id) {
    $query = "DELETE FROM editoriales WHERE idEditorial='$id'";
    mysql_query($query) or die(mysql_error());
}

function q_removeCategoria($id) {
    $query = "DELETE FROM etiquetas WHERE nombre='$id'";
    mysql_query($query) or die(mysql_error());
}

function q_isPresentAutor($nombre) {
    
}

; // devuelve true or false dependiendo si
// el autor esta presente en la DB o no

function q_isPresentEditorial($nombre) {
    
}

;

function q_isPresentCategoria($nombre) {
    
}

;

function q_isPresentLibro($nombre) {
    
}

;

function q_listAutor($rangemax = 1000) {
    $query = 'SELECT * FROM autores LIMIT 0 , ' . $rangemax;
    return mysql_query($query);
}

// lista todos los autores hasta
// $rangemax, valor por defecto lista toda la base de datos
function q_listEditorial($rangemax = 1000) {
    $query = 'SELECT * FROM editoriales LIMIT 0 , ' . $rangemax;
    return mysql_query($query);
}

;

function q_listCategoria($rangemax = 1000) {
    $query = 'SELECT * FROM etiquetas LIMIT 0 , ' . $rangemax;
    return mysql_query($query);
}

;

function q_isAdminUsuario($username) {
    
}

;

// devuelve verdadero o falso si el usuario $nombre es admin o no, el usuario DEBE
// existir TODO: esta consulta podria no existir
function q_libroViewAutor($ISBN) {
    
}

;

function q_libroViewEditorial($ISBN) {
    
}

;

function q_libroViewCategoria($ISBN) {
    
}

;

function q_isDisponibleLibro($ISBN) {
    
}

;



