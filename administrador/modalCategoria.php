 <div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby=addCategoria aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Categoria</h4>
                </div>
                <div class="modal-body">
                    <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreEtiqueta']['nombreEtiqueta'].value)" id="inputNombreEtiqueta" action="comprobaciones.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Etiqueta</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreEtiqueta">
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