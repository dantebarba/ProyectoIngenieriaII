<?php

const database = 'u172127113_ing';

        
        
function q_getUsuario($nombre, $DNI=-1) {
    $query = "SELECT * FROM usuarios WHERE username = '$nombre' or DNI=".$DNI;
    $row = mysql_query($query) or die(mysql_error());
    return $row;
}

function q_listUsuarios(){
    $query = "SELECT * FROM usuarios WHERE isDeleted=0 and isAdmin=0";
    $row = mysql_query($query) or die(mysql_error());
    return $row;
}

function q_listUserBetween ($fechaUno, $fechaDos) {
    $query = "SELECT * FROM usuarios WHERE (isDeleted=0) and fecha_registrado BETWEEN '$fechaUno' and '$fechaDos'";
    $row = mysql_query($query) or die(mysql_error());
    return $row;
}


function q_listLibrosBetween ($fechaUno, $fechaDos, $rangemax=1000) {
    $query = "SELECT l.ISBN, l.titulo, l.paginas, l.fechaDeRegistro, l.precio, l.idioma, l.fecha, la.Autores_idAutor, le.Editoriales_idEditorial, el.Etiquetas_idEtiqueta FROM libros l "
            . "LEFT JOIN libros_has_autores la ON ( l.ISBN = la.Libros_ISBN ) LEFT JOIN etiquetas_has_libros el ON (l.ISBN = el.Libros_ISBN)"
            . " LEFT JOIN libros_has_editoriales le ON ( l.ISBN = le.Libros_ISBN )"
            . " WHERE isDeleted=0 and l.fechaDeRegistro BETWEEN '".$fechaUno."' and '".$fechaDos."' ORDER BY l.titulo LIMIT 0 , " . $rangemax;
    $row = mysql_query($query) or die(mysql_error());
    return $row;
}

function q_getLibro($ISBN) {
    $query = "SELECT * FROM libros WHERE ".$ISBN."=ISBN";
    $result = mysql_query($query) or die(mysql_error());
    return $result;
}

function q_getCategoria($idEtiqueta) {
    $query = "SELECT * FROM etiquetas WHERE ".$idEtiqueta."=idEtiqueta";
    $result = mysql_query($query) or die(mysql_error());
    return $result;
}

function q_getEditorial($idEditorial) {
    $query = "SELECT * FROM editoriales WHERE ".$idEditorial."=idEditorial";
    $result = mysql_query($query) or die(mysql_error());
    return $result;
}

;

function q_getAutor($idAutor) {
    $query = "SELECT * FROM autores WHERE ".$idAutor."=idAutor";
    $result = mysql_query($query) or die(mysql_error());
    return $result;
}

;

function q_getCompra($idCompra) {
    
}

;

function q_updateLibro($dataCollection) {
    $query = 
            "UPDATE `libros` SET "
            . "`titulo`='".$dataCollection['titulo']."',"
            . "`paginas`=".$dataCollection['paginas'].","
            . "`precio`=".$dataCollection['precio'].","
            . "`idioma`='".$dataCollection['idioma']."',"
            . "`fecha`='".$dataCollection['fecha']."'"
            . " WHERE ".$dataCollection['ISBN']."=ISBN";
    mysql_query($query) or die(mysql_error());
}
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

function q_updateUsuario($dataCollection) {
    $query = 
            "UPDATE `usuarios` SET "
            . "`DNI`=".$dataCollection['DNI'].","
            . "`username`='".$dataCollection['username']."',"
            . "`password`='". $dataCollection['password'] ."',"
            . "`tel_fijo`=".$dataCollection['tel_fijo'].","
            . "`tel_cel`=".$dataCollection['tel_cel'].","
            . "`genero`='".$dataCollection['genero']."',"
            . "`fecha_nac`='". $dataCollection['fecha_nac'] ."',"
            . "`email`='".$dataCollection['email']."'"
            . "WHERE ".$dataCollection['DNI']."=DNI";
    mysql_query($query) or die(mysql_error());
    
}

function q_updateDireccion($dataCollection) {
    $query =
            "UPDATE `direccion` SET "
            . "`calle`=". $dataCollection['calle'].","
            . "`localidad`='". $dataCollection['localidad']."',"
            . "`numero`=". $dataCollection['numero'].","
            . "`provincia`='". $dataCollection['provincia']."',"
            . "`departamento`=". $dataCollection['departamento'].","
            . "`numDpto`=". $dataCollection['numDpto'].""
            . "WHERE ".$dataCollection['DNI']."=Usuarios_DNI";
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

function q_getDireccion($usuario) {
    $query = "SELECT * FROM direccion WHERE '".$usuario."'=Usuarios_username";
    $result = mysql_query($query) or die(mysql_error());
    return $result;
}

function q_addAutor($nombre, $DNI) {
    $query = "INSERT INTO autores (nombre, DNI) VALUES ('$nombre', '$DNI')";
    mysql_query($query) or die(mysql_error());
}

function q_addEditorial($nombre) {
    $query = "INSERT INTO editoriales (nombre) VALUES ('$nombre')";
    mysql_query($query) or die(mysql_error());
}



function q_addCategoria($nombre) {
    $query = "INSERT INTO etiquetas (nombre) VALUES ('$nombre')";
    mysql_query($query) or die(mysql_error());
}

function q_addLibro($dataCollection) {
    $query=
            "INSERT INTO `libros`"
            . "(`ISBN`, `titulo`, `paginas`, `precio`, `idioma`, `fecha`) "
            . "VALUES ('"
            . $dataCollection['ISBN'] . "','"
            . $dataCollection['titulo'] . "','"
            . $dataCollection['paginas'] . "','"
            . $dataCollection['precio']. "','"
            . $dataCollection['idioma'] . "','"
            . $dataCollection['fecha'] . "')";
    
    mysql_query($query) or die(mysql_error());
}

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

function q_removeLibro($ISBN) {
    $query="UPDATE libros SET isDeleted=1 WHERE '$ISBN'=ISBN";
    mysql_query($query) or die(mysql_error());
}
function q_removeUsuario($username) {
    $query = "UPDATE usuarios SET isDeleted=1 WHERE username='$username'";
    mysql_query($query) or die(mysql_error());
}
function q_isPresentUsuario($username, $DNI=-1) {
    $query="SELECT username,DNI FROM usuarios WHERE ('$username'=username or DNI=".$DNI.")";
    $result=mysql_query($query) or die(mysql_error());
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
    $query="SELECT DNI FROM autores WHERE '$DNI'=DNI and '$id' <> idAutor";
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

function q_isPresentLibro($ISBN) {
    $query = 'SELECT * FROM libros WHERE ISBN='.$ISBN;
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else {
        return true;
    }
}



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

function q_listLibros($rangemax = 1000) {
    $query = 'SELECT l.ISBN, l.titulo, l.paginas, l.precio, l.idioma, l.fecha, la.Autores_idAutor, le.Editoriales_idEditorial, el.Etiquetas_idEtiqueta FROM libros l '
            . 'LEFT JOIN libros_has_autores la ON ( l.ISBN = la.Libros_ISBN ) LEFT JOIN etiquetas_has_libros el ON (l.ISBN = el.Libros_ISBN)'
            . ' LEFT JOIN libros_has_editoriales le ON ( l.ISBN = le.Libros_ISBN )'
            . ' WHERE l.isDeleted=0 ORDER BY titulo LIMIT 0 , ' . $rangemax;
    return mysql_query($query);
}



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


function q_isDisponibleUsuario($username) {
    $query = "SELECT isDeleted FROM usuarios WHERE '$username'=username and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else { return true;}
};

function q_isDisponibleUsuarioPorDNI($dni) {
    $query = "SELECT isDeleted FROM usuarios WHERE '$dni'=dni and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else { return true;} 
};

function q_isDisponibleLibro($ISBN) {
    $query = "SELECT isDeleted FROM libros WHERE '$ISBN'=ISBN and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else { return true;} 
}

function q_isDisponibleAutor($idAutor) {
    $query = "SELECT isDeleted FROM autores WHERE '$idAutor'=idAutor and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else { return true;} 
}

function q_isDisponibleAutorPorDni($dni) {
    $query = "SELECT isDeleted FROM autores WHERE '$dni'=DNI and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else { return true;} 
}

function q_isDisponibleCategoria($idEtiqueta) {
    $query = "SELECT isDeleted FROM etiquetas WHERE '$idEtiqueta'=idEtiqueta and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else { return true;} 
}
// -------------------
function q_isDisponibleCategoriaPorNom($nombre) {
    $query = "SELECT isDeleted FROM etiquetas WHERE '$nombre'=nombre and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0) {
        return false;
    }
    else { return true;} 
    
}
// ----------------

function q_isDisponibleEditorial($idEditorial) {
    $query = "SELECT isDeleted FROM editoriales WHERE '$idEditorial'=idEditorial and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else { return true;} 
}

function q_isDisponibleEditorialPorNom($nombre) {
    $query = "SELECT isDeleted FROM editoriales WHERE '$nombre'=nombre and isDeleted=0";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0)
    {
        return false;
    }
    else { return true;} 
}

function q_linkUsuarioToDireccion($idDireccion, $username, $DNI)
// linkea la clave foranea de un usuario con una direccion.    
{
    $query = "UPDATE direccion SET Usuarios_username='$username', Usuarios_DNI='$DNI'"
            . "WHERE idDireccion = '$idDireccion'";
    return mysql_query($query);  
}

function q_linkAutorToLibro($idAutor, $ISBN) {
    $query = "SELECT Libros_ISBN FROM libros_has_autores WHERE '$ISBN'=Libros_ISBN";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0) 
    { 
        $query = "INSERT INTO `libros_has_autores`"
                . "(`Libros_ISBN`, `Autores_idAutor`) VALUES ("
                . $ISBN . "," . $idAutor. ")";
        mysql_query($query) or die(mysql_error());
    }
    else {
        $query = "UPDATE `libros_has_autores` "
                . "SET"
                . "`Autores_idAutor`='$idAutor' WHERE Libros_ISBN=".$ISBN;
        mysql_query($query) or die(mysql_error());
    }
    
}

function q_linkCategoriaToLibro($idEtiqueta, $ISBN) {
    $query = "SELECT Libros_ISBN FROM etiquetas_has_libros WHERE '$ISBN'=Libros_ISBN";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0) 
    { 
        $query = "INSERT INTO `etiquetas_has_libros`"
                . "(`Libros_ISBN`, `Etiquetas_idEtiqueta`) VALUES ("
                . $ISBN . "," . $idEtiqueta. ")";
        mysql_query($query) or die(mysql_error());
    }
    else {
        $query = "UPDATE `etiquetas_has_libros` "
                . "SET"
                . "`Etiquetas_idEtiqueta`='$idEtiqueta' WHERE Libros_ISBN=".$ISBN;
        mysql_query($query) or die(mysql_error());
    }
    
}

function q_linkEditorialToLibro($idEditorial, $ISBN) {
    $query = "SELECT Libros_ISBN FROM libros_has_editoriales WHERE '$ISBN'=Libros_ISBN";
    $result = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($result) == 0) 
    { 
        $query = "INSERT INTO `libros_has_editoriales`"
                . "(`Libros_ISBN`, `Editoriales_idEditorial`) VALUES ("
                . $ISBN . "," . $idEditorial. ")";
        mysql_query($query) or die(mysql_error());
    }
    else {
        $query = "UPDATE `libros_has_editoriales` "
                . "SET"
                . "`Editoriales_idEditorial`='$idEditorial' WHERE Libros_ISBN=".$ISBN;
        mysql_query($query) or die(mysql_error());
    }
    
}

function q_linkCompraToUsuario($idCompra, $username, $DNI) {
    
}

function q_enableLibro($ISBN) {
    $query = "UPDATE libros SET isDeleted=0 WHERE '$ISBN'=ISBN";
    mysql_query($query) or die(mysql_error());
}

function q_enableUsuario($username, $DNI=-1) {
    $query = "UPDATE usuarios SET isDeleted=0 WHERE '$username'=username or ".$DNI."=DNI";
    mysql_query($query) or die(mysql_error());
}


function q_habilitarAutor ($DNI) {
    $query = "UPDATE autores SET isDeleted=0 WHERE '$DNI'=DNI";
    mysql_query($query) or die(mysql_error());
}
function q_habilitarCategoria ($nombre) {
    $query = "UPDATE etiquetas SET isDeleted=0 WHERE '$nombre'=nombre";
    mysql_query($query) or die(mysql_error());
}

function q_habilitarEditorial ($nombre) {
     $query = "UPDATE editoriales SET isDeleted=0 WHERE '$nombre'=nombre";
     mysql_query($query) or die(mysql_error());
}

function q_mismoAutor($nombre,$DNI) {
    $query = "SELECT nombre FROM autores WHERE '$DNI'=DNI";
    $result = mysql_query($query) or die(mysql_error());
    if ($line = mysql_fetch_array($result)) {
            if ($line['nombre'] == $nombre) 
                return true;
    }
     return false;
}


function q_searchLibroLike($titulo) {
    $query = 'SELECT l.ISBN, l.titulo, l.paginas, l.precio, l.idioma, l.fecha, la.Autores_idAutor, le.Editoriales_idEditorial, el.Etiquetas_idEtiqueta FROM libros l '
            . 'LEFT JOIN libros_has_autores la ON ( l.ISBN = la.Libros_ISBN ) LEFT JOIN etiquetas_has_libros el ON (l.ISBN = el.Libros_ISBN)'
            . ' LEFT JOIN libros_has_editoriales le ON ( l.ISBN = le.Libros_ISBN )'
            . ' WHERE l.titulo LIKE "%'.$titulo.'%" and l.isDeleted=0 ORDER BY titulo';
    $result = mysql_query($query) or die(mysql_error());
    return $result;
}

function q_searchLibroLikeAutor($nombre) {
    $query = '';
    return mysql_query($query) or die(mysql_error());
}

function q_searchLibroLikeCategoria($nombre) {
    $query = '';
    return mysql_query($query) or die(mysql_error());
}


