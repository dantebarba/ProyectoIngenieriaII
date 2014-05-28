<head><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <link href="theme.css" rel="stylesheet">
        <title>Cookbook</title>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <!-- Modals, MUST MODULARIZAR!-->
    <!-- Modal agregar autor-->
    <div class="modal fade" id="agregarAutor" tabindex="-1" role="dialog" aria-labelledby=addAutor aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar autor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="comprobaciones.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputNombre" class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputNombre">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Modal agregar editorial -->
    <div class="modal fade" id="agregarEditorial" tabindex="-1" role="dialog" aria-labelledby=addEditorial aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar editorial</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputNombre" class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"id="inputNombre">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal agregar Categoria-->
    <div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby=addCategoria aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Categoría</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEtiquieta" class="col-lg-2 control-label">Etiqueta</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"id="inputEtiqueta">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal agregar libro-->
    <div class="modal fade" id="agregarLibro" tabindex="-1" role="dialog" aria-labelledby=addLibro aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Libro</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputPaginas" class="col-lg-2 control-label">Páginas</label>
                            <div class="col-lg-10">
                                <input for="inputPages" type="text" class="form-control" id="inputPaginas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPrecio" class="col-lg-2 control-label">Precio</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputPrecio">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputIdioma" class="col-lg-2 control-label">Idioma</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputIdioma">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFecha" class="col-lg-2 control-label">Fecha</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" id="inputFecha">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include 'header.php'; ?>
    <body>
        <div class="page-header">
            <h1>Panel de administrador<small>  Agregar/modificar/eliminar/listar: autores, editoriales, categorias, libros</small></h1>
        </div>
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Autores</h3>
            </div><div class="panel-body">
                <ul>
                    <button type='button'class="btn  btn-success" data-toggle="modal" data-target="#agregarAutor">Agregar</button>
                    <button type='button'class="btn btn-warning">Modificar</button>
                    <button type='button'class="btn btn-danger">Eliminar</button>
                    <button type="button"class="btn btn-primary">Listar</button>
                </ul>
            </div></div>
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Editoriales</h3>
            </div><div class="panel-body">
                <ul>
                    <button type='button'class="btn btn-success" data-toggle="modal" data-target="#agregarEditorial">Agregar</button>
                    <button type='button'class="btn btn-warning">Modificar</button>
                    <button type='button'class="btn btn-danger">Eliminar</button>
                    <button type="button"class="btn btn-primary">Listar</button>
                </ul>
            </div></div>
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Categorias</h3>
            </div><div class="panel-body">
                <ul>
                    <button type='button'class="btn  btn-success" data-toggle="modal" data-target="#agregarCategoria">Agregar</button>
                    <button type='button'class="btn btn-warning">Modificar</button>
                    <button type='button'class="btn btn-danger">Eliminar</button>
                    <button type="button"class="btn btn-primary">Listar</button>
                </ul>
            </div></div>
        <div class="panel panel-primary"> <div class="panel-heading">
                <h3 class="panel-title">Libros</h3>
            </div><div class="panel-body">
                <ul>
                    <button type='button'class="btn btn-success" data-toggle="modal" data-target="#agregarLibro">Agregar</button>
                    <button type='button'class="btn btn-warning">Modificar</button>
                    <button type='button'class="btn btn-danger">Eliminar</button>
                    <button type="button"class="btn btn-primary">Listar</button>
                </ul>
            </div></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js"></script>
    </body>