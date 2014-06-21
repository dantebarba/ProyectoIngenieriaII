<div class="modal fade" id="agregarLibro" tabindex="-1" role="dialog" aria-labelledby=addLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="inputLibro" onsubmit="return tiene_numeros(document.forms['inputLibro']['inputPaginas'].value)" role="form">
                    <div class="form-group">
                        <label for="inputISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="inputISBN" type="text" class="form-control" id="inputISBN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="inputTitulo" type="text" class="form-control" id="inputTitulo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAutor" class="col-lg-2 control-label">Autor</label>
                        <div class="col-lg-10">
                            <select name = 'inputAutor' class="form-control">
                                <?php
                                    include '../dbconnection.php';
                                    $link = connectdb();
                                    include '../queries.php';
                                    $result = q_listAutor() or die('Error en la consulta a la base de datos' . mysql_error());
                                    while ($row = mysql_fetch_array($result)) {
                                        echo '  <option value="'. $row['DNI'] .'">'. $row['nombre'] .'</option>';
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEditorial" class="col-lg-2 control-label">Editorial</label>
                        <div class="col-lg-10">
                            <select name = 'inputEditorial' class="form-control">
                                <?php
                                    $link = connectdb();
                                    $result = q_listEditorial() or die('Error en la consulta a la base de datos' . mysql_error());
                                    while ($row = mysql_fetch_array($result)) {
                                        echo '  <option value="'. $row['idEditorial'] .'">'. $row['nombre'] .'</option>';
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
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