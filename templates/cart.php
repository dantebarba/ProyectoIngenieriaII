 
<html>
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <title>Cookbook - Carrito</title>

        <!-- Bootstrap core CSS -->
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <script src="/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/mustache.js" type="text/javascript"></script>
        <link href="/css/custom.css" rel="stylesheet">
        <script type="text/javascript">
            articulos = { // aqui va el JSON
                            "items": [
                            {   id: 1,
                                titulo: 'Hola',
                                precio: 20,
                                descripcion: 'tete',
                                cantidad: 1
                            },
                            {   id: 2,
                                titulo: 'Chau',
                                precio: 30,
                                descripcion: 'casa',
                                cantidad: 2
                            }
                            ]};
            
            $(document).ready(function() {
                     
               $.get(
			'articulo.php',
			function(d){
				var renderedPage = Mustache.to_html( d, articulos);
                                $("#articuloiFrame").html(renderedPage);
			}
		);
                
            });
            $(document).on("click", "#itemTrash", function() {
                    $("#itemTrash").closest(".article").remove();
                });
        </script>    
    </head>
    
    <?php include '../header.php'; ?>
    <body>
     
    <div class="container">
            <div class="row">
                    <div class="col-xs-8">
                            <div class="panel panel-info">
                                    <div class="panel-heading">
                                            <div class="panel-title" id='articulosPanel'>
                                                    <div class="row">
                                                            <div class="col-xs-6">
                                                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <a href="../index.php" ><button type="button" class="btn btn-primary btn-sm btn-block">
                                                                            <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                                                    </button></a>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                                     <div class="panel-body" id='articuloiFrame'>
                                     </div>
                                    <div class="panel-footer">
                                            <div class="row text-center">
                                                    <div class="col-xs-9">
                                                            <h4 class="text-right">Total </h4>
                                                    </div>
                                                    <div class="col-xs-3">
                                                            <button type="button" class="btn btn-success btn-block">
                                                                    Checkout
                                                            </button>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>


    </body>
</html>    
    
