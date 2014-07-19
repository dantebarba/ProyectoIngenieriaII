<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
$respuesta['status'] = 'error_validationError';

include_once '../dbconnection.php';    

$link = connectdb();

include_once '../queries.php';




function addItemToCart($ISBN) {
    if (q_isPresentLibro($ISBN) && q_isDisponibleLibro($ISBN)) {
        $_SESSION['cart'][$ISBN]++; 
    }
    return 'success';
}

function updateQty($ISBN, $value) {
    
    $_SESSION['cart'][$ISBN] = $value;
    return 'success';
}

function removeItemFromCart($ISBN) {
   
    unset($_SESSION['cart'][$ISBN]);
    return 'success';
}

function clearCart() {
    foreach ($_SESSION['cart'] as $key => $value) {
        removeItemFromCart($key);
    }
    return 'success';
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

function generarOrden($datosTarjeta) {
    // Aqui se genera la orden con su ID
   
    foreach ($_SESSION['cart'] as $key => $value) {
        $libro = mysql_fetch_assoc(q_getLibro($key));
        $valorTotal = $libro['precio'];
        
    }
    $idPedido = q_newPedido($valorTotal);
    foreach ($_SESSION['cart'] as $key => $value) {
        for ( $i=0; $i < $value;$i++ ) {
            q_linkCompraToLibro($idPedido, $key);
        }
        
    }
    $usuario = mysql_fetch_assoc(q_getUsuario($_COOKIE['username']));
    q_linkCompraToUsuario($idPedido, $usuario['username'], $usuario['DNI']);
    q_linkTarjetaToCompra($idPedido, $datosTarjeta);
    clearCart();
    return $idPedido;
}




if (isset($_POST['tokenID'])) {
    if (isset($_POST['cleanCart'])) {
        clearCart();
        $respuesta['status'] = 'success';
    }
    else if (isset($_POST['getItems'])) {
       $respuesta['status'] = 'success';
       $respuesta['items'] = getItem();
       unset($_POST['tokenID']);
       echo json_encode($respuesta);
       exit();
    } 
    else if (isset($_POST['addItemToCart'])) {
        $respuesta['status'] = addItemToCart($_POST['ISBN']);
        echo json_encode($respuesta);
        exit();
    }
    else if (isset($_POST['removeItemFromCart'])) {
        $respuesta['status'] = removeItemFromCart($_POST['ISBN']);
        echo json_encode($respuesta);
        exit();
    }
    else if (isset($_POST['updateQty'])) {
        $respuesta['status'] = updateQty($_POST['ISBN'], $_POST['value']);
        echo json_encode($respuesta);
        exit();   
    }
    else if (isset($_POST['cvv'])) {
        $respuesta['status'] = 'success';
        $respuesta['message'] = 'Se ha procesado el pago correctamente';
        $datosTarjeta['titular'] = $_POST['card-holder-name'];
        $datosTarjeta['numero'] = $_POST['card-number'];
        $respuesta['orderID'] = generarOrden($datosTarjeta);
        echo json_encode($respuesta);
        exit();
    }
    unset($_POST['tokenID']);
    echo json_encode($respuesta);
    die();
}

mysql_close($link);