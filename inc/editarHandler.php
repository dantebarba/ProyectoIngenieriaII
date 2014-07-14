<?php

include '../dbconnection.php';
$database = connectdb();
include '../queries.php';
$dataCollection['username'] = $_POST['editarUsername'];
$dataCollection['password'] = $_POST['editarPassword'];
$dataCollection['DNI'] = $_POST['editarDNI'];
$dataCollection['tel_fijo'] = $_POST['editarTel_fijo'];
$dataCollection['tel_cel'] = $_POST['editarTel_cel'];
$dataCollection['genero'] = $_POST['editarGenero'];
$dataCollection['email'] = $_POST['editarEmail'];
$dataCollection['isAdmin'] = 0;
$dataCollection['fecha_nac'] = date('Y-m-d', strtotime($_POST['editarFecha_nac']));
// DIRECCION

$dataCollection['calle'] = $_POST['editarCalle'];
$dataCollection['localidad'] = $_POST['editarLocalidad'];
$dataCollection['numero'] = $_POST['editarNumero'];
$dataCollection['provincia'] = $_POST['editarProvincia'];
$dataCollection['departamento'] = $_POST['editarIsDpto'];

if ($dataCollection['departamento'] == '1') {
    $dataCollection['numDpto'] = $_POST['editarDepartamento'];
} else {
    $dataCollection['numDpto'] = "NULL";
}
if ($dataCollection['tel_cel'] === '') {
    $dataCollection['tel_cel'] = "NULL";
} else if ($dataCollection['tel_fijo'] === '') {
    $dataCollection['tel_fijo'] = "NULL";
}

q_updateUsuario($dataCollection);
//q_updateDireccion($dataCollection);
$respuesta['status'] = 'success';
$respuesta['message'] = 'Datos actualizados, muchas gracias! <strong>' . $dataCollection['username'] . '!</strong>';
header('Content-type: application/json');
echo json_encode($respuesta);
mysql_close($database);
exit();
?>
