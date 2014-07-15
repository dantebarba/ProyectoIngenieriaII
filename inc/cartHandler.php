<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

include_once '../dbconnection.php';    

$link = connectdb();

include_once '../queries.php';

function generarOrden() {
    // Aqui se genera la orden con su ID
    
    return mysql_insert_id();
}

function addItemToCart($ISBN) {
    $respuesta['status'] = 'error';
    if (q_isPresentLibro($ISBN) && q_isDisponibleLibro($ISBN)) {
        $_SESSION['cart'][$ISBN]++; 
        $respuesta['status'] = 'success';
    }
    echo json_encode($respuesta);
    exit();
}

function updateQty($ISBN, $value) {
    $respuesta['status'] = 'success';
    $_SESSION['cart'][$ISBN] = $value;
    json_encode($respuesta);
    exit();
}

function removeItemFromCart($ISBN) {
    $respuesta['status'] = 'success';
    unset($_SESSION['cart'][$ISBN]);
    json_encode($respuesta);
    exit();
}

function getItem() {
    $param['items'] = array();
    foreach ($_SESSION['cart'] as $key => $value) {
        $row = mysql_fetch_assoc(q_getLibro($key));
        $row['cantidad'] = $_SESSION['cart'][$key]; // marcamos la cantidad de libros
        $param['items'][] = $row;
    }
    return $param['items'];
}



$respuesta['status'] = 'error_validationError';
if (isset($_POST['tokenID'])) {
       $respuesta['status'] = 'success';
       $respuesta['items'] = getItem();
       unset($_POST['tokenID']);
       echo json_encode($respuesta);
       exit();
    } 
    else if (isset($_POST['addItemToCart'])) {
        addItemToCart($_POST['ISBN']);
    }
    else if (isset($_POST['removeItemFromCart'])) {
        removeItemFromCart($_POST['ISBN']);
    }
    else if (isset($_POST['updateQty'])) {
        updateQty($_POST['ISBN'], $_POST['value']);
    }
    else if (isset($_POST['creditCardForm'])) {
        $respuesta['status'] = 'success';
        $respuesta['message'] = 'Se ha procesado el pago correctamente';
        json_encode($respuesta);
        exit();
    }
    else if (isset($_POST['nuevoPedido'])) {
        $respuesta['orderID'] = generarOrden();
        $respuesta['status'] = 'success';
        $respuesta['message'] = 'Su orden ha sido procesada';
        unset($_POST['tokenID']);
        // unset($_SESSION['tokenID']);
        json_encode($respuesta);
    }

mysql_close($link);



