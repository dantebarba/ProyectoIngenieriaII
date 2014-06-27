<script>
    function callModal(modalID) {
           $(".modal-body #fromModal").val('1');
           $("#agregarLibro").modal("hide");
           $(modalID).modal('show');
       } 
       
</script>
<div class="modal fade" id="agregarLibro" tabindex="-1" role="dialog" aria-labelledby=addLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" name="libro_add" id="inputLibro" onsubmit="return tiene_letrasss((document.forms['inputLibro']['inputTitulo'].value),(document.forms['inputLibro']['inputIdioma'].value))" action="librocp.php" role="form">
                    <div class="form-group">
                        <label for="inputISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="inputISBN" type="number" min="0" class="form-control" id="inputISBN"name="inputISBN" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="inputTitulo" type="text" class="form-control" id="inputTitulo" name="inputTitulo" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputLinkAutor" class="col-lg-2 control-label">Autor</label>
                        <div class="col-xs-4">
                            <select name = 'inputLinkAutor' id='inputLinkAutor' class="form-control" name="inputLinkAutor">
                                <?php
                                include '../dbconnection.php';
                                $link = connectdb();
                                include '../queries.php';
                                $result = q_listAutor();
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="'.$row['idAutor'].'">'.$row['nombre'].' - '.$row['DNI'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" id="openModalAgregarAutor" onClick='callModal("#agregarAutor")'>Agregar Autor</button>
                    </div>
                        
                    <div class="form-group">
                        <label for="inputLinkEditorial" class="col-lg-2 control-label">Editorial</label>
                        <div class="col-xs-4">
                            <select id="inputLinkEditorial" name = 'inputLinkEditorial' class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listEditorial() or die('Error en la consulta a la base de datos' . mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="' . $row['idEditorial'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <button type='button' class='btn btn-sm btn-primary' onClick='callModal("#agregarCategoria")'>Agregar Categoria</button>
                    </div>
                    <div class="form-group">
                        <label for="inputLinkEtiqueta" class="col-lg-2 control-label">Categoria</label>
                        <div class="col-lg-10">
                            <select id="inputLinkEtiqueta" name = 'inputLinkEtiqueta' class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listCategoria() or die('Error en la consulta a la base de datos' . mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="' . $row['idEtiqueta'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                      
                        <label for="inputPaginas" class="col-lg-2 control-label">Páginas</label>
                        <div class="col-lg-10">
                            <input for="inputPaginas" type="number" min="1" class="form-control" id="inputPaginas" name="inputPaginas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPrecio" class="col-lg-2 control-label">Precio</label>
                        <div class="col-lg-10">
                            <input type="number" min="0"  step="0.01" required class="form-control" id="inputPrecio" name="inputPrecio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputIdioma" class="col-lg-2 control-label">Idioma</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputIdioma" name="inputIdioma">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFecha" class="col-lg-2 control-label">Fecha</label>
                        <div class="col-xs-4">
                            <input type="date" required class="form-control" id="inputFecha" name="inputFecha">
                        </div>
                    </div>
            <input type='hidden' name='elemente' value='libro_add'/>            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="editarLibro" tabindex="-1" role="dialog" aria-labelledby=editLibro aria-hidden="true"onsubmit="return tiene_letrasss((document.forms['editarLibro']['editTitulo'].value),(document.forms['editarLibro']['editIdioma'].value))">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" name='libro_edit' action="librocp.php" id="editLibro" role="form">
                    <div class="form-group">
                        <label for="editISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="editISBN" type="text" min="0" class="form-control" id="editISBN" name="editISBN" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="editTitulo" type="text" class="form-control" id="editTitulo" name='editTitulo' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editLinkAutor" class="col-lg-2 control-label">Autor</label>
                        <div class="col-lg-10">
                            <select name='editLinkAutor' id='editLinkAutor' class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listAutor() or die('Error en la consulta a la base de datos' . mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                   
                                        echo '  <option value="'.$row['idAutor'].'">'.$row['nombre'].' - '.$row['DNI'].'</option>'; 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editLinkEditorial" class="col-lg-2 control-label">Editorial</label>
                        <div class="col-lg-10">
                            <select name = 'editLinkEditorial' id="editLinkEditorial" class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listEditorial();
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="' . $row['idEditorial'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editLinkEtiqueta" class="col-lg-2 control-label">Categoria</label>
                        <div class="col-xs-4">
                            <select name = 'editLinkEtiqueta' id="editLinkEtiqueta" class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listCategoria();
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="' . $row['idEtiqueta'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type='button' class='btn btn-sm btn-primary' onClick='callModal("#agregarCategoria")'>
                    </div>
                    <div class="form-group">                      
                        <label for="editPaginas" class="col-lg-2 control-label">Páginas</label>
                        <div class="col-lg-10">
                            <input for="editPaginas" type="number" min="1" class="form-control" id="editPaginas" name="editPaginas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editPrecio" class="col-lg-2 control-label">Precio</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" min="0" id="editPrecio" name="editPrecio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editIdioma" class="col-lg-2 control-label">Idioma</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="editIdioma" name="editIdioma">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editFecha" class="col-lg-2 control-label">Fecha</label>
                        <div class="col-xs-4">
                            <input type="date" class="form-control" id="editFecha" name="editFecha" >
                        </div>
                    </div>
                    <input type='hidden' name='elemente' value='libro_edit'/> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>    
                </form>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="eliminarLibro" tabindex="-1" role="dialog" aria-labelledby=deleteLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar Editorial</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="deleteLibro" action="librocp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="deleteISBN" name="deleteISBN" readonly>
                        </div>
                        <label class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="deleteTitulo" name="deleteTitulo" readonly>
                        </div>
                    </div>
                    <input type='hidden' name='elemente' value='libro_del'/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

