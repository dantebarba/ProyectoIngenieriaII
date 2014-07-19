
<div class="modal fade" id="editarCompra" tabindex="-1" role="dialog" aria-labelledby=editCompra aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Editar Compra</h4>
            </div>
            <div class="modal-body">
               <!-- <form method="post" id="editDataEstado" onsubmit="return tiene_letras(document.forms['editDataEditorial']['editar_nombreEditorial'].value)" action="compracp.php" class="form-horizontal" role="form"> -->
               <form method="post" id="editCompra" action="compracp.php" class="form-horizontal" role="form">
                   <div class="form-group">
                        <label for="editarIdCompra" class="col-lg-2 control-label">Id Compra</label>
                        <div class="col-lg-10">
                            <input for="editarIdCompra" type="text" min="0" class="form-control" id="editIdCompra" name="editIdCompra" readonly>
                        </div>
                        
                   </div> 
                   <div class="form-group">
                        <label for="editarISBNlibro" class="col-lg-2 control-label">ISBN Libro</label>
                        <div class="col-lg-10">
                            <input for="editarISBNlibro" type="text" min="0" class="form-control" id="editISBN" name="editISBN" readonly>
                        </div>
                        
                   </div>
                    <div class="form-group">
                        <label for="editTitulo" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="editTitulo" type="text" min="0" class="form-control" id="editTitulo" name="editTitulo" readonly>
                        </div>
                        
                   </div>
                   <div class="form-group">
                        <label class="col-lg-2 control-label">Estado de Compra</label>
                        <div class="col-lg-10">
                         <!--   <input type="text" class="form-control"  maxlength="45" id="editEstado" name="editEstado"> -->
                           <select name='editEstado' id='editEstado' class="form-control" maxlength="45">
                                <option value="Entregado">Entregado</option>
                                <option value="Enviando">Enviando</option>
                                <option value="Esperando retiro">Esperando retiro</option>
                           </select> 
                        </div>
                        
                    </div>
                   <div class="form-group">
                        <label for="editTitular" class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input for="editTitular" type="text" min="0" class="form-control" id="editTitular" name="editTitular" readonly>
                        </div>
                        
                   </div>
                    <input type='hidden' name='elemente' value='compra_edit'/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="eliminarCompra" tabindex="-1" role="dialog" aria-labelledby=deleteCompra aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eliminar Compra</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="deleteCompra" action="compracp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Id Compra</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="deleteIdCompra" name="deleteIdCompra" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">ISBN Libro</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="deleteISBN" name="deleteISBN" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Titulo</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="deleteTitulo" name="deleteTitulo" readonly>
                        </div>
                    </div>
                    <input type='hidden' name='elemente' value='compra_del'/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

