<?php

function connectdb() {
$server = "localhost";
$database = "ingenieriaii";
$username = "root";
$password = "";
$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection) {
    return NULL;
} else {
    mysql_select_db($database, $mysqlConnection);
    return $mysqlConnection;
}
}
?>
