


<div class="modal fade" id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby=editCategory aria-hidden="true">
    
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="labelEditar">Editar Categoria</h4>
            </div>
            <div class="modal-body">
                <form method="post" name="editDataCategoria" id="editDataCategoria" onsubmit="return tiene_letras(document.forms['editDataCategoria']['editar_nombreEtiqueta'].value)"  action="categoriacp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label" >Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control"  maxlength="15" id="editar_nombreEtiqueta" name="editar_nombreEtiqueta">
                        </div>
                    </div>
                    <input type='hidden' name='element' value='Etiqueta_edit'/>
                    <input type='hidden' name='editar_idEtiqueta' id='editar_idEtiqueta' />
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" >Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



<div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby=addCategoria aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Categoria</h4>
            </div>
            <div class="modal-body">
                <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreEtiqueta']['agregar_nombreEtiqueta'].value)" id="inputNombreEtiqueta" action="categoriacp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" maxlength="15" id="agregar_nombreEtiqueta" name="agregar_nombreEtiqueta">
                        </div>
                    </div>
                    <input type='hidden' name='element' value='Etiqueta_add'/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="eliminarCategoria" tabindex="-1" role="dialog" aria-labelledby=deleteCategory aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="labelEditar">Eliminar Categoria</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="deleteDataCategoria" name="deleteDataCategoria" onsubmit="return tiene_letras(document.forms['inputNombreCategoria']['eliminar_idEtiqueta'].value)"  action="categoriacp.php" class="form-horizontal" role="form">
                    <div class="form-group">

                        
                        <label class="col-lg-2 control-label" >Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="eliminar_nombreEtiqueta" readonly style="background-color:lightgray" name="eliminar_nombreEtiqueta">
                        </div>
                        
                    </div>
                    <input type='hidden' name='eliminar_idEtiqueta' id='eliminar_idEtiqueta' />
                    <input type='hidden' name='element' value='Etiqueta_del'/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger"  >Eliminar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>