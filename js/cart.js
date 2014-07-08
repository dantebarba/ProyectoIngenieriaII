                
                function addToCart(item) {
                   // script simple para añadir al carrito, aqui ira
                   // el llamado AJAX
                   // test example
                   $.post('../inc/cartHandler.php', {addItemToCart: true,ISBN: item}, function(data) {
                       console.log(data);
                   }, "json");
               }
               
               function removeFromCart(item) {
                   // script simple para añadir al carrito, aqui ira
                   // el llamado AJAX
                   // test example
                   $.post('../inc/cartHandler.php', {removeItemFromCart: true,ISBN: item}, function(data) {
                       console.log(data);
                   }, "json");
               }
               
               function updateQty(item, value) {
                   // actualiza la cantidad de unidades
                   // pedidas de un elemento
                   $.post('../inc/cartHandler.php', {updateQty: true,ISBN: item, value: value}, function(data) {
                       console.log(data);
                   }, "json");
               }
               
               
               function ajaxGetItems(callback) {
                   
                   $.post('../inc/cartHandler.php',{tokenID: ''}, function (itemsList){
                       if (itemsList.status === 'success') {
                           callback(itemsList.items);
                       }
                       else if (itemsList.status === 'error_validationError') {
                           console.log(itemsList);
                           alert('Error al recuperar articulos del carrito');
                       }
                   }, "json"); 
               }
               
               

