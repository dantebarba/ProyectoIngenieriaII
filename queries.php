<?php

const database = 'u172127113_ing';

        
        
function q_getUsuario($nombre) {
    $query = "SELECT * FROM usuarios WHERE username = '$nombre'";
    $row = mysql_query($query) or die(mysql_error());
    return $row;
}




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

function q_addUsuario($dataCollection) {
    $query = "INSERT INTO `usuarios`(`DNI`, `username`, `password`, `tel_fijo`, `tel_cel`, `genero`,"
            . " `fecha_nac`, `email`, `isAdmin`) VALUES "
            . "(".$dataCollection['DNI'].",'".$dataCollection['username']."','"
            . $dataCollection['password'] . "',".$dataCollection['tel_fijo'].","
            . $dataCollection['tel_cel'] .",'".$dataCollection['genero']."','"
            . $dataCollection['fecha_nac'] ."', '".$dataCollection['email']."' ,"
            . $dataCollection['isAdmin'].")";
    mysql_query($query) or die(mysql_error());
    
}

function q_addDireccion($dataCollection) {
    $query = "INSERT INTO `direccion`(`calle`, `localidad`, `numero`, "
            . "`provincia`, `departamento`, `numDpto`)"
            . " VALUES ('"
            . $dataCollection['calle']."','"
            . $dataCollection['localidad']."',"
            . $dataCollection['numero'].",'"
            . $dataCollection['provincia']."',"
            . $dataCollection['departamento'].",'" // el campo departamento podria
            // ser borrado
            . $dataCollection['numDpto']."')";
    mysql_query($query) or die(mysql_error());
}



function q_addAutor($nombre, $DNI) {
    $query = "INSERT INTO autores (nombre, DNI) VALUES ('$nombre', '$DNI')";
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

function q_updateAutor($id, $nombre, $DNI) {
    $query = "UPDATE autores SET nombre='$nombre',DNI=" . $DNI . " WHERE " . $id . "=idAutor";
    mysql_query($query) or die(mysql_error());
}

function q_updateEditorial($id, $nombre) {
    $query = "UPDATE editoriales SET nombre='$nombre' WHERE " . $id . "=idEditorial";
    mysql_query($query) or die(mysql_error());
}

function q_updateCategoria($id, $nombre) {
    $query = "UPDATE etiquetas SET nombre='$nombre' WHERE " . $id . "=idEtiqueta";
    mysql_query($query) or die(mysql_error());
}

function q_removeAutor($id) { // elimina el autor segun $ID, no hace
    $query = "UPDATE autores SET isDeleted=1 WHERE idAutor='$id'";
    mysql_query($query) or die(mysql_error());
}

function q_removeEditorial($id) {
    $query = "UPDATE editoriales SET isDeleted=1 WHERE idEditorial='$id'";
    mysql_query($query) or die(mysql_error());
}

function q_removeCategoria($id) {
    $query = "UPDATE etiquetas SET isDeleted=1 WHERE idEtiqueta='$id'";
    mysql_query($query) or die(mysql_error());
}

function q_isPresentUsuario($username, $DNI) {
    $query="SELECT username FROM usuarios WHERE '$username'=username or DNI='$DNI'";
    $result=mysql_query($query);
    if (mysql_num_rows($result) == 0) {
        return false;
    }
    else { 
        return true;
    }
}

function q_isPresentAutor($DNI, $id=-1) {
    // devuelve TRUE si esta PRESENTE; devuelve FALSE si no lo esta
    // Busca solo por DNI
    // Se agregó el campo que comprueba si fue eliminado logicamente
    $query="SELECT DNI FROM autores WHERE '$DNI'=DNI and '$id' <> idAutor and isDeleted=0";
    $result=mysql_query($query); 
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else {
        return true;
    }
}

; // devuelve true or false dependiendo si
// el autor esta presente en la DB o no

function q_isPresentEditorial($nombre, $id=-1) {
   $query="SELECT nombre FROM editoriales WHERE '$nombre'=nombre and '$id'<> idEditorial";
    $result=mysql_query($query); 
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else {
        return true;
    } 
}

;

function q_isPresentCategoria($nombre, $id=-1) {
    $query="SELECT nombre FROM etiquetas WHERE '$nombre'=nombre and '$id' <> idEtiqueta";
    $result=mysql_query($query); 
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else {
        return true;
    }
}

;

function q_isPresentLibro($nombre) {
    
}

;

function q_listAutor($rangemax = 1000) {
    $query = 'SELECT * FROM autores WHERE isDeleted=0 ORDER BY nombre LIMIT 0 , ' . $rangemax;
    return mysql_query($query);
}

// lista todos los autores hasta
// $rangemax, valor por defecto lista toda la base de datos
function q_listEditorial($rangemax = 1000) {
    $query = 'SELECT * FROM editoriales WHERE isDeleted=0 ORDER BY nombre LIMIT 0 , ' . $rangemax;
    return mysql_query($query);
}

;

function q_listCategoria($rangemax = 1000) {
    $query = 'SELECT * FROM etiquetas WHERE isDeleted=0 ORDER BY nombre LIMIT 0 , ' . $rangemax;
    return mysql_query($query);
}

;

function q_isAdminUsuario($username) {
    $row = q_getusuario($username);
    $user = mysql_fetch_array($row);
    if ($row['isAdmin'] == 0) {
        return false;
    }
    else {return true;}
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



function q_isDisponibleLibro($ISBN) {
    
}

function q_linkUsuarioToDireccion($idDireccion, $username, $DNI)
// linkea la clave foranea de un usuario con una direccion.    
{
    $query = "UPDATE direccion SET Usuarios_username='$username', Usuarios_DNI='$DNI'"
            . "WHERE idDireccion = '$idDireccion'";
    return mysql_query($query);  
}

function q_linkCompraToUsuario($idCompra, $username, $DNI) {}
