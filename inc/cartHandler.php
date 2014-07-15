<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    


include_once '../dbconnection.php';    

$link = connectdb();

include_once '../queries.php';




function addItemToCart($ISBN) {
    $respuesta['status'] = 'error';
    if (q_isPresentLibro($ISBN) && q_isDisponibleLibro($ISBN)) {
        $_SESSION['cart'][$ISBN]++; 
        $respuesta['status'] = 'success';
    }
    
}

function updateQty($ISBN, $value) {
    $respuesta['status'] = 'success';
    $_SESSION['cart'][$ISBN] = $value;
    
}

function removeItemFromCart($ISBN) {
    $respuesta['status'] = 'success';
    unset($_SESSION['cart'][$ISBN]);
    
}

function clearCart() {
    foreach ($_SESSION['cart'] as $key => $value) {
        removeItemFromCart($key);
    }
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

function generarOrden() {
    // Aqui se genera la orden con su ID
   
    foreach ($_SESSION['cart'] as $key => $value) {
        $libro = mysql_fetch_assoc(q_getLibro($key));
        $valorTotal = $libro['precio'] * $value;
        
    }
    $idPedido = q_newPedido($valorTotal);
    foreach ($_SESSION['cart'] as $key => $value) {
        q_linkCompraToLibro($idPedido, $key);
        
    }
    $usuario = mysql_fetch_assoc(q_getUsuario($_COOKIE['username']));
    q_linkCompraToUsuario($idPedido, $usuario['username'], $usuario['DNI']);
    clearCart();
    return $idPedido;
}



$respuesta['status'] = 'error_validationError';
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
        addItemToCart($_POST['ISBN']);
        echo json_encode($respuesta);
        exit();
    }
    else if (isset($_POST['removeItemFromCart'])) {
        removeItemFromCart($_POST['ISBN']);
        echo json_encode($respuesta);
        exit();
    }
    else if (isset($_POST['updateQty'])) {
        updateQty($_POST['ISBN'], $_POST['value']);
        echo json_encode($respuesta);
        exit();   
    }
    else if (isset($_POST['cvv'])) {
        $respuesta['status'] = 'success';
        $respuesta['message'] = 'Se ha procesado el pago correctamente';
        echo json_encode($respuesta);
        exit();
    }
    else if (isset($_POST['nuevoPedido'])) {
        $respuesta['orderID'] = generarOrden();
        $respuesta['status'] = 'success';
        $respuesta['message'] = 'Su orden ha sido procesada';
        // unset($_SESSION['tokenID']);
        echo json_encode($respuesta);
        exit();
    }
    unset($_POST['tokenID']);
    echo json_encode($respuesta);
    exit();
}

mysql_close($link);