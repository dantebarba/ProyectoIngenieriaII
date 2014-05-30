 <div class="modal fade" id="agregarAutor" tabindex="-1" role="dialog" aria-labelledby=addAutor aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar autor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="comprobaciones.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputNombre" class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputNombre">
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