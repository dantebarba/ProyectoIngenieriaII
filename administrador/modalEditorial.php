<div class="modal fade" id="agregarEditorial" tabindex="-1" role="dialog" aria-labelledby=addEditorial aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Editorial</h4>
            </div>
            <div class="modal-body">
                <form method="post"  id="inputDataEditorial" onsubmit="return tiene_letras(document.forms['inputDataEditorial']['agregar_nombreEditorial'].value)" action="editorialcp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" maxlength="45" id="agregar_nombreEditorial" name="agregar_nombreEditorial">
                        </div>
                    </div>
                    <input type='hidden' name='elemente' value='editorial_add'/>
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
                <form method="post" id="editDataEditorial" onsubmit="return tiene_letras(document.forms['editDataEditorial']['editar_nombreEditorial'].value)" action="editorialcp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  maxlength="45" id="editar_nombreEditorial" name="editar_nombreEditorial">
                        </div>
                        
                    </div>
                    <input type='hidden' name='elemente' value='editorial_edit'/>
                    <input type="hidden" id="editar_idEditorial" name="editar_idEditorial" >
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
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
                <form method="post" id="deleteDataEditorial" action="editorialcp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="eliminar_nombreEditorial" name="eliminar_nombreEditorial" readonly style="background-color:lightgray">
                        </div>
                    </div>
                    <input type='hidden' name='elemente' value='editorial_del'/>
                    <input type="hidden" id="eliminar_idEditorial" name="eliminar_idEditorial" >
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>