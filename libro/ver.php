  
<?php
        if (isset($_POST['ajaxCall'])) {
            include_once '../dbconnection.php';
            $link = connectdb();
            include_once '../queries.php';
            $respuesta['status'] = 'success';
            if (q_isPresentLibro($_POST['ISBN'])) {
                $result = q_getLibro($_POST['ISBN']);
                $respuesta['data'] = mysql_fetch_assoc($result);
            }
            else {
                $respuesta['status'] = 'error_notFound';
            }
            echo json_encode($respuesta); 
            mysql_close($link);
            exit();
        }
    ?>

<!DOCTYPE html>
<html lang="en">
     
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <title>Buscar</title>
        <script src="../js/jquery-2.1.1.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js"></script>
        <link href='../css/custom.css' rel='stylesheet'>
        <script src="../js/mustache.js" type="text/javascript"></script>
        <script src="../js/jquery.hotkeys.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/noty/packaged/jquery.noty.packaged.min.js"></script>
        <script src="/js/notifications.js" type="text/javascript"></script>
        <script src="../js/cart.js" type="text/javascript"></script>
        <script type="text/javascript">
            function getParameterByName( name,href ) // nada importante, solo para
            // obtener los parametros de la URL
                {
                  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
                  var regexS = "[\\?&]"+name+"=([^&#]*)";
                  var regex = new RegExp( regexS );
                  var results = regex.exec( href );
                  if( results == null )
                    return "";
                  else
                    return decodeURIComponent(results[1].replace(/\+/g, " "));
                }
            $(document).ready(function() {
                
                $.post('./ver.php',{ISBN: getParameterByName('ISBN', window.location.href),ajaxCall: 'yes'}, function(ajaxData) {
                    template = '../templates/libro.php';
                    if (ajaxData.status === 'success') {
                    }
                    else if (ajaxData.status === 'error_notFound') {
                        template = '../templates/notfound.html';
                    }
                    $.get(
                                 template,
                                 function(d){
                                         var renderedPage = Mustache.to_html( d, ajaxData.data);
                                         $("#dataiFrame").html(renderedPage);
                                 }
                         );
                }, "json");
            });
            
        </script>
    </head>
     <?php include '../header.php'; ?> 
        
    <body>
        <div class='container' style="padding-top: 70px;" id="dataiFrame">
            
        </div>
    </body>
    

  