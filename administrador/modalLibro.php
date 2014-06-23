<<<<<<< HEAD
<div class="modal fade" id="agregarLibro" tabindex="-1" role="dialog" aria-labelledby=addLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="inputLibro" onsubmit="return tiene_letrasss((document.forms['inputLibro']['inputISBN'].value), (document.forms['inputLibro']['inputTitulo'].value), (document.forms['inputLibro']['inputPaginas'].value), (document.forms['inputLibro']['inputPrecio'].value), (document.forms['inputLibro']['inputIdioma'].value), (document.forms['inputLibro']['inputFecha'].value), (document.forms['inputLibro']['inputAutor'].value), (document.forms['inputLibro']['inputEditorial'].value))" action="librocp.php" role="form">
                    <div class="form-group">
                        <label for="inputISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="inputISBN" type="number" class="form-control" id="inputISBN">
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
                                    echo '  <option value="'.$row['DNI'].'">'.$row['nombre'].' - '.$row['DNI'].'</option>';
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
                                    echo '  <option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                      
                        <label for="inputPaginas" class="col-lg-2 control-label">Páginas</label>
                        <div class="col-lg-10">
                            <input for="inputPaginas" type="text" class="form-control" id="inputPaginas">
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
            <input type='hidden' name='elemente' value='Libro_add'/>            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="editarLibro" tabindex="-1" role="dialog" aria-labelledby=editLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="librocp.php" id="editLibro" onsubmit="return tiene_letrasss((document.forms['editLibro']['editISBN'].value), (document.forms['editLibro']['editTitulo'].value), (document.forms['editLibro']['editPaginas'].value), (document.forms['editLibro']['editPrecio'].value), (document.forms['editLibro']['editIdioma'].value), (document.forms['editLibro']['editFecha'].value), (document.forms['editLibro']['editAutor'].value), (document.forms['editLibro']['editEditorial'].value))" role="form">
                    <div class="form-group">
                        <label for="inputISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="editISBN" type="text" class="form-control" id="editISBN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="editTitulo" type="text" class="form-control" id="editTitulo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAutor" class="col-lg-2 control-label">Autor</label>
                        <div class="col-lg-10">
                            <select name = 'editAutor' class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listAutor() or die('Error en la consulta a la base de datos' . mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="'.$row['DNI'].'">'.$row['nombre'].' - '.$row['DNI'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editEditorial" class="col-lg-2 control-label">Editorial</label>
                        <div class="col-lg-10">
                            <select name = 'editEditorial' class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listEditorial() or die('Error en la consulta a la base de datos' . mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="' . $row['idEditorial'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                      
                        <label for="editPaginas" class="col-lg-2 control-label">Páginas</label>
                        <div class="col-lg-10">
                            <input for="editPages" type="text" class="form-control" id="editPaginas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editPrecio" class="col-lg-2 control-label">Precio</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="editPrecio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editIdioma" class="col-lg-2 control-label">Idioma</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="editIdioma">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editFecha" class="col-lg-2 control-label">Fecha</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="editFecha">
                        </div>
                    </div>
                </form>
            </div>
            <input type='hidden' name='elemente' value='Libro_edit'/>    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" method="post" action="librocp.php" id="eliminarLibro" tabindex="-1" role="dialog" aria-labelledby=deleteLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eliminar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="deleteLibro" role="form">
                    <div class="form-group">
                        <label for="inputISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="delISBN" type="number" class="form-control" id="delISBN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="inputTitulo" type="text" class="form-control" id="inputTitulo">
                        </div>
                    </div>
                </form>
            </div>
            <input type='hidden' name='elemente' value='Libro_del'/>            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>

=======
<div class="modal fade" id="agregarLibro" tabindex="-1" role="dialog" aria-labelledby=addLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="inputLibro" onsubmit="return tiene_letrasss((document.forms['inputLibro']['inputISBN'].value), (document.forms['inputLibro']['inputTitulo'].value), (document.forms['inputLibro']['inputPaginas'].value), (document.forms['inputLibro']['inputPrecio'].value), (document.forms['inputLibro']['inputIdioma'].value), (document.forms['inputLibro']['inputFecha'].value), (document.forms['inputLibro']['inputAutor'].value), (document.forms['inputLibro']['inputEditorial'].value))" action="librocp.php" role="form">
                    <div class="form-group">
                        <label for="inputISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="inputISBN" type="number" class="form-control" id="inputISBN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="inputTitulo" type="text" class="form-control" id="inputTitulo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editLinkAutor" class="col-lg-2 control-label">Autor</label>
                        <div class="col-lg-10">
                            <select name = 'editLinkAutor' id='editLinkAutor' class="form-control">
                                <?php
                                include '../dbconnection.php';
                                $link = connectdb();
                                include '../queries.php';
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
                            <select id="editLinkEditorial" name = 'editLinkEditorial' class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listEditorial() or die('Error en la consulta a la base de datos' . mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="' . $row['idEditorial'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                      
                        <label for="inputPaginas" class="col-lg-2 control-label">Páginas</label>
                        <div class="col-lg-10">
                            <input for="inputPaginas" type="text" class="form-control" id="inputPaginas">
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
            <input type='hidden' name='elemente' value='Libro_add'/>            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="editarLibro" tabindex="-1" role="dialog" aria-labelledby=editLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="librocp.php" id="editLibro" onsubmit="return tiene_letrasss((document.forms['editLibro']['editISBN'].value), (document.forms['editLibro']['editTitulo'].value), (document.forms['editLibro']['editPaginas'].value), (document.forms['editLibro']['editPrecio'].value), (document.forms['editLibro']['editIdioma'].value), (document.forms['editLibro']['editFecha'].value), (document.forms['editLibro']['editAutor'].value), (document.forms['editLibro']['editEditorial'].value))" role="form">
                    <div class="form-group">
                        <label for="inputISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="editISBN" type="text" class="form-control" id="editISBN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="editTitulo" type="text" class="form-control" id="editTitulo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAutor" class="col-lg-2 control-label">Autor</label>
                        <div class="col-lg-10">
                            <select name = 'editAutor' class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listAutor() or die('Error en la consulta a la base de datos' . mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="'.$row['DNI'].'">'.$row['nombre'].' - '.$row['DNI'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editEditorial" class="col-lg-2 control-label">Editorial</label>
                        <div class="col-lg-10">
                            <select name = 'editEditorial' class="form-control">
                                <?php
                                $link = connectdb();
                                $result = q_listEditorial() or die('Error en la consulta a la base de datos' . mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    echo '  <option value="' . $row['idEditorial'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">                      
                        <label for="editPaginas" class="col-lg-2 control-label">Páginas</label>
                        <div class="col-lg-10">
                            <input for="editPages" type="text" class="form-control" id="editPaginas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editPrecio" class="col-lg-2 control-label">Precio</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="editPrecio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editIdioma" class="col-lg-2 control-label">Idioma</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="editIdioma">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editFecha" class="col-lg-2 control-label">Fecha</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="editFecha">
                        </div>
                    </div>
                </form>
            </div>
            <input type='hidden' name='elemente' value='Libro_edit'/>    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" method="post" action="librocp.php" id="eliminarLibro" tabindex="-1" role="dialog" aria-labelledby=deleteLibro aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eliminar Libro</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="deleteLibro" role="form">
                    <div class="form-group">
                        <label for="inputISBN" class="col-lg-2 control-label">ISBN</label>
                        <div class="col-lg-10">
                            <input for="delISBN" type="number" class="form-control" id="delISBN">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="inputTitulo" type="text" class="form-control" id="inputTitulo">
                        </div>
                    </div>
                </form>
            </div>
            <input type='hidden' name='elemente' value='Libro_del'/>            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>

>>>>>>> 85d2e1aa96711b1d574ed295508d4f8a5711ad0e
