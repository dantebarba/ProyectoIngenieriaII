<head>Prueba</head>
<body>
<?php
// Datos para la conexion
$host = '190.191.146.103';
$database = 'mysql_database';
$username = 'root';
$password = '';

// Conectarse a MySQL
$link = mysql_connect($host, $username, $password);
if (!$link) {
    die('Error al conectarse a mysql: ' . mysql_error());
}

// Seleccionar nuestra base de datos
$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ('Error al abrir la base de datos: ' . mysql_error());
}
else {
 echo 'Conexion exitosa.';
}
?>
</body>