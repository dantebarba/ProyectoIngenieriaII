   <div class="modal fade" id="agregarLibro" tabindex="-1" role="dialog" aria-labelledby=addLibro aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Libro</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputPaginas" class="col-lg-2 control-label">Páginas</label>
                            <div class="col-lg-10">
                                <input for="inputPages" type="text" class="form-control" id="inputPaginas">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>