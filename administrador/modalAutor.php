<div class="modal fade" id="editarAutor" tabindex="-1" style="display: none;" aria-labelledby=editAutor >
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" d
                        ata-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="labelEditar">Editar Autor</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="editDataAutor" name="editDataAutor" onsubmit="return tiene_letrass((document.forms['editDataAutor']['editar_nombreAutor'].value),(document.forms['editDataAutor']['editar_DNIAutor'].value))" action="autorcp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-lg-10">
                            <label class="col-lg-1 control-label" >Nombre</label>
                            <input type="text" class="form-control" maxlength="64" id="editar_nombreAutor" name="editar_nombreAutor">
                        </div>
                        <div class="col-lg-10">
                            <label class="col-lg-1 control-label" >DNI</label>
                            <input type="number" class="form-control" id="editar_DNIAutor" name="editar_DNIAutor">
                        </div>
                    </div>
                    <input type='hidden' name='element' value='autor_edit'/>
                    <input type="hidden" class="form-control" id="editar_idAutor" name="editar_idAutor">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" >Aceptar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready( function() {
            var options = {
                        success : function(element) { 
                            // DISMISS MODAL AND PASS VALUE PARAMETER
                            console.log(element);
                            if (element.status === 'success') {
                                
                                if ($("#fromModal").val === "1") {
                                    alert('callback return');
                                    $("#inputLinkAutor").val(element.id);
                                    $("#agregarLibro").removeClass('hide');
                                };
                            }
                            else if (element.status === 'error_autorExists') {
                                alert("ERROR: Ya existe el autor");
                            }
                            
                        },
                        error: function (element) {
                            console.log(element);
                        },
                        type : 'post',
                        dataType : 'json'
            };
            $("#inputDataAutor").ajaxForm(options);
    
    
        });
    
    </script>
</div>
<div class="modal fade" id="agregarAutor" tabindex="-1" aria-labelledby=addAutor>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addAutorTitle">Agregar autor</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="inputDataAutor" name="inputDataAutor"  onsubmit="return tiene_letrass((document.forms['inputDataAutor']['agregar_nombreAutor'].value),(document.forms['inputDataAutor']['agregar_DNIAutor'].value))" action="autorcp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" maxlength="64" id="agregar_nombreAutor" name="agregar_nombreAutor">
                        </div>
                        <label class="col-lg-2 control-label" >DNI</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" maxlength="32" id="agregar_DNIAutor" name="agregar_DNIAutor">
                        </div>
                    </div>
                    <input type='hidden' name='element' value='autor_add'/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                    <input type="hidden" value="0">
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
                <form method="post" id="deleteDataAutor" name="deleteDataAutor" onsubmit="return tiene_letras(document.forms['inputNombreAutor']['nombreAutor'].value)"  action="autorcp.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-2 control-label" >Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="eliminar_nombreAutor" readonly style="background-color:lightgray" name="eliminar_nombreAutor">
                        </div>
                    </div>
                    <input type='hidden' name='element' value='autor_del'/>
                    <input type="hidden" id="eliminar_idAutor" name="eliminar_idAutor">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger"  >Eliminar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
