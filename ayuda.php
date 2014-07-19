<head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <link href="../theme.css" rel="stylesheet">
        <title>Cookbook</title>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/noty/packaged/jquery.noty.packaged.min.js" type="text/javascript"></script>
        <script src='/js/notifications.js' type='text/javascript'></script>
        <script src='/js/modalFunctions.js' type='text/javascript'></script>
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js"></script>
        <script language="JavaScript" type="text/JavaScript"> 

         function mostrar(parrafo){
             
          //   var obj1 = document.getElementById('respuesta1');
          //   obj1.style.display = "none";
          //   var obj2 = document.getElementById('respuesta2');
          //   obj2.style.display = "none";
             var obj = document.getElementById(parrafo)
               if(obj.style.display == "none")  obj.style.display = "block";
               else obj.style.display = "none";
                       
             
              // alert('hola');
              }

        </script>

        
</head>

<?php include 'header.php'; ?>

<body>
  <div style="margin-left:100px; margin-right:100px;">  
  <h1>Ayuda</h1>
   
          <div id="node-8">
          
                  <div property="content:encoded">
                    
                      
                      <br /><a href="#" onClick="mostrar('respuesta1')" style="font-size:19px;">&iquest;Cu&aacute;l es la ventaja de registrarse en el sistema?</a>&nbsp;<br />
                      <br />
                      <div id="respuesta1" name="respuesta1" style="display:none; font-size:16px;">
                                <strong>Como usuario registrado usted tiene acceso a  informaci&oacute;n m&aacute;s detallada de los libros que desee visitar, y tiene la posibilidad de realizar compras de los mismos. Si a&uacute;n no est&aacute; registrado, usted puede acceder a parte de la informaci&oacute;n de los libros otorgados por Cookbook, pero no est&aacute; autorizado a realizar ninguna compra.</strong><br />
                                <br />
                      </div>  
                      <a href="#" onClick="mostrar('respuesta2')" style="font-size:19px;">&iquest;C&oacute;mo me registro en el sistema?</a>&nbsp;<br />
                        <br />
                      <div id="respuesta2" style="display:none; font-size:16px;">
                                <strong>Para registrarse en el sistema, haga click en el boton &quot;Registrarse&quot;. All&iacute; le aparecer&aacute; un formulario donde deber&aacute; ingresar los datos personales requeridos para su debida incripci&oacute;n. Una vez completado el formulario, haga click en el bot&oacute;n enviar si est&aacute; listo para ser usuario de Cookbook. Puede cancelar su inscripci&oacute;n con el bot&oacute;n &quot;Cancelar&quot;, o puede vaciar el formulario en su totalidad con el bot&oacute;n &quot;Limpiar formulario&quot;.</strong><br />
                                <br />
                      </div>  
                      <a href="#" onClick="mostrar('respuesta3')" style="font-size:19px;">&iquest;C&oacute;mo modifico mis datos personales?</a>&nbsp;<br />
                        <br />
                      <div id="respuesta3" name="respuesta3" style="display:none; font-size:16px;">
                                <strong>Una vez registrado en Cookbook, tiene la posibilidad de modificar sus datos personales haciendo click en &quot;Editar usuario&quot;. Le aparecer&aacute; el mismo formulario que se le pidi&oacute; para su registro, y all&iacute; tendr&aacute; la posibilidad de modificarlos. Una vez completado el formulario, haga click en el bot&oacute;n enviar. Tambi&eacute;n puede cancelar su inscripci&oacute;n con el bot&oacute;n &quot;Cancelar&quot;, o puede recuperar el formulario inicial (previo a hacer alguna modificaci&oacute;n) con el bot&oacute;n &quot;Datos previos&quot;.</strong><br />
                                <br />
                      </div> 
                      <a href="#" onClick="mostrar('respuesta4')" style="font-size:19px;">&iquest;C&oacute;mo eliminar mi cuenta?</a>&nbsp;<br />
                      <br />
                      <div id="respuesta4" name="respuesta4" style="display:none; font-size:16px;">
                                <strong>Para eliminar su cuenta de usuario, deber&aacute; hacer click en &quot;Editar Usuario&quot;. All&iacute; deber&aacute; presionar el bot&oacute;n &quot;Eliminar usuario&quot; y se eliminar&aacute; satisfactoriamente.</strong><br />
                                <br />
                      </div> 
                      <a href="#" onClick="mostrar('respuesta5')" style="font-size:19px;">&iquest;C&oacute;mo realizar una compra?</a>&nbsp;<br />
                      <br />
                      <div id="respuesta5" name="respuesta5" style="display:none; font-size:16px;">
                                <strong>Una vez registrado, usted podrá acceder a información de libros y además tendrá la posibildad de comprarlos clickeando la opción "Add to Cart". Para verificar, los libros que vaya adhiriendo en su carrito de compras, deberá clickear el botón "Carrito". Allí se detallarán los libros comprados, la cantidad de cada uno, y el costo total de la compra.</strong><br />
                                <br />
                      </div> 
                      
                      <a href="#" onClick="mostrar('respuesta6')" style="font-size:19px;">&iquest;Cual&eacute;s son las formas de pago?</a>&nbsp;<br />
                      <br />
                      <div id="respuesta6" name="respuesta6" style="display:none; font-size:16px;">
                                <strong>Podr&aacute; pagar mediante tarjeta de cr&eacute;dito o de d&eacute;bito. Para ello deber&aacute; ingresar el nombre del titular, n&uacute;mero de tarjeta, fecha de expiraci&oacute;n y el c&oacute;digo CVV de la misma.</strong><br />
                                <br />
                      </div> 
                      <a href="#" onClick="mostrar('respuesta7')" style="font-size:19px;">&iquest;Hacen env&iacute;os a domicilio?</a>&nbsp;<br />
                      <br />
                      <div id="respuesta7" name="respuesta7" style="display:none; font-size:16px;">
                                <strong>Si hacemos envíos a domicilio, recuerde que para que los productos lleguen a destino debe introducir
                                los datos correctos de su domicilio a la hora de registrarse.</strong><br />
                                <br />
                      </div>
                      
                      
                    
                  </div>
               
       
                          
  </div>
  </div>
<body>
    