

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <title>Cookbook</title>

        <!-- Bootstrap core CSS -->
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="jumbotron.css" rel="stylesheet">
    </head>

    <?php include 'header.php'; ?>
    <body>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                       <img src="http://ingenieriaii.url.ph/images/logo.png" alt="Logo" class="img-rounded center-block"</img>
                       <p>Cookbook ofrece servicio de ventas de libros culinarios tanto para cocineros aficionados como experimentados.</p>
            </div>
        </div>
            <hr>

            <footer>
                <p>&copy; CompumundoHiperMegaRed 2014</p>
            </footer>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/noty/packaged/jquery.noty.packaged.min.js"></script>
        <script src="/js/jquery.form.js" type="text/javascript"></script>
        <script type="text/javascript">
                // LOGIN SCRIPT
                $(document).ready(function() {
                    $("#messageBox").hide();
                    var options = {
                        beforeSubmit: function() {
                            $("#btnLogIn").prop("disabled", true);
                            $('#loginModal').noty(
                                        {   layout: 'inline',
                                            text: 'Iniciando Sesion...',
                                            timeout: false,
                                            type: 'information',
                                            closeWith: ['button']
                                        });
                        },
                        success : function(element) { 
                            $.noty.closeAll();
                            if (element.status === 'success') {
                                window.location.href = element.redirect;
                            }
                            else if (element.status === 'error_invalidLogin') {
                                $('#loginModal').noty(
                                        {   layout: 'inline',
                                            text: element.message,
                                            timeout: '3000',
                                            type: 'error'
                                            
                                        });
                            $("#btnLogIn").prop("disabled", false);
                            } // sucess envia Objeto json
                        },
                        error: function (element) {
                            console.log(element);
                            noty({text: 'ERROR EN EL SERVIDOR', type: 'error'});
                        },
                        type : 'post',
                        dataType : 'json'
                    }; 
                    $("#loginForm").ajaxForm(options);
                });
                
            </script>
    </body>
</html>
