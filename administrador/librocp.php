<?php
if (!($_COOKIE['isAdmin'] != '')) {
    echo 'error de permisos';
    die();
}
?>