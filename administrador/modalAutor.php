 <div class="modal fade" id="editarAutor" tabindex="-1" role="dialog" aria-labelledby=editAutor aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="labelEditar">Editar Autor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreAutor']['nombreAutor'].value)" id="inputNombreAutor" action="autorcp.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreAutor">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
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
                    <h4 class="modal-title" id="myModalLabel">Agregar autor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreAutor']['nombreAutor'].value)" id="inputNombreAutor" action="autorcp.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreAutor">
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