

<div class="modal fade" id="editarAutor" tabindex="-1" role="dialog" aria-labelledby=editAutor aria-hidden="true">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="labelEditar">Editar Autor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" name="autorForm" onsubmit="return tiene_letras(document.forms['inputNombreAutor']['nombreAutor'].value)" id="editDataAutor" action="autorcp.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="idAutor" readonly style="background-color:lightgray" name="idAutor">
                            </div>
                            <label class="col-lg-2 control-label" >Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreAutor" name="editNombre">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" >Aceptar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
     
    </div>


<div class="modal fade" id="agregarAutor" tabindex="-1" role="dialog" aria-labelledby=addAutor aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="addAutorTitle">Agregar autor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreAutor']['nombreAutor'].value)" id="inputDataAutor" action="autorcp.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreAutor" name="inputAutor">
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

<div class="modal fade" id="eliminarAutor" tabindex="-1" role="dialog" aria-labelledby=deleteAutor aria-hidden="true">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="labelEditar">Eliminar Autor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" name="autorForm" onsubmit="return tiene_letras(document.forms['inputNombreAutor']['nombreAutor'].value)" id="deleteDataAutor" action="autorcp.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="idAutor" readonly style="background-color:lightgray" name="idAutor">
                            </div>
                            <label class="col-lg-2 control-label" >Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreAutor" name="deleteNombre">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-danger" >Eliminar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
     
    </div>
