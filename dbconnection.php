<?php

function connectdb() {
$server = "mysql.hostinger.com.ar";
$database = "u172127113_ing";
$username = "u172127113_dante";
$password = "ingenieria2";
$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection) {
    return NULL;
} else {
    mysql_select_db($database, $mysqlConnection);
    return $mysqlConnection;
}
}
?>
