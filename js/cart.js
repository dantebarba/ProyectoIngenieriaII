
function addToCart(item) {
   // script simple para añadir al carrito, aqui ira
   // el llamado AJAX
   // test example
   $.post('../inc/cartHandler.php', {tokenID: '', addItemToCart: true,ISBN: item}, function(data) {
       console.log(data);
   }, "json");
}

function removeFromCart(item) {
   // script simple para añadir al carrito, aqui ira
   // el llamado AJAX
   // test example
   $.post('../inc/cartHandler.php', {tokenID: '', removeItemFromCart: true,ISBN: item}, function(data) {
       console.log(data);
   }, "json");
}

function updateQty(item, value) {
   // actualiza la cantidad de unidades
   // pedidas de un elemento
   $.post('../inc/cartHandler.php', {tokenID: '', updateQty: true,ISBN: item, value: value}, function(data) {
       console.log(data);
   }, "json");
}


function ajaxGetItems(callback) {

   $.post('../inc/cartHandler.php',{tokenID: '', getItems: true}, function (itemsList){
       if (itemsList.status === 'success') {
           callback(itemsList.items);
       }
       else if (itemsList.status === 'error_validationError') {
           console.log(itemsList);
           alert('Error al recuperar articulos del carrito');
       }
   }, "json"); 
}

function cleanCart() {
   $.post('/inc/cartHandler.php', {tokenID: '', cleanCart: true}, function (response){
       if (response.status === 'success') {
           location.reload();
       }
   }, "json");
}

function calcTotal(articulos) {
        var total = 0;
        for (i=0; i < articulos.length; i++) {
            total += articulos[i].precio * articulos[i].cantidad;
        }
        return total;
    }


function checkQty(element) {
    if ($(element).val() < 1) {
        $(element).val("1");
    }
}

