 <div class="modal fade" id="agregarEditorial" tabindex="-1" role="dialog" aria-labelledby=addEditorial aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Editorial</h4>
                </div>
                <div class="modal-body">
                    <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreEditorial']['nombreEditorial'].value)" id="inputDataEditorial" action="comprobaciones.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreEditorial" name="inputEditorial">
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

 <div class="modal fade" id="editarEditorial" tabindex="-1" role="dialog" aria-labelledby=editEditorial aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar Editorial</h4>
                </div>
                <div class="modal-body">
                    <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreEditorial']['nombreEditorial'].value)" id="editDataEditorial" action="editorialcp.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="idEditorial" name="idEditorial">
                            </div>
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreEditorial" name="nombreEditorial">
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

 <div class="modal fade" id="eliminarEditorial" tabindex="-1" role="dialog" aria-labelledby=deleteEditorial aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar Editorial</h4>
                </div>
                <div class="modal-body">
                    <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreEditorial']['nombreEditorial'].value)" id="deleteDataEditorial" action="editorialcp.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="idEditorial" name="idEditorial">
                            </div>
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreEditorial" name="nombreEditorial">
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