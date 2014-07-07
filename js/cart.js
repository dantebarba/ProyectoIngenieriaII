
                function addToCart(item) {
                   // script simple para añadir al carrito, aqui ira
                   // el llamado AJAX
                   // test example
                   if (jQuery.inArray(item, items) === -1) {
                       items.push(item);
                       alert('Elemento ID:'+item+' Añadido a Carrito');
                   }
                   else {
                       alert('Already on cart');
                   }
               }
               
               
               


