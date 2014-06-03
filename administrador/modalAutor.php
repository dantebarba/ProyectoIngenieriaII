<<<<<<< HEAD
 
<script type="text/javascript">
    // ACA VA EL SCRIPT DE UPDATE, se le pasa a la DB los nuevos
    // datos
    // tambien se puede hacer con php (seria lo ideal)

</script> 

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
                            <label class="col-lg-2 control-label">ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="idAutor" readonly style="background-color:lightgray">
                            </div>
                            <label class="col-lg-2 control-label" >Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nombreAutor">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" onClick="updateAutor()">Aceptar</button>
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
                            <button type="submit" class="btn btn-primary" onClick="addAutor()">Agregar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
=======

<div class="modal fade" id="editarAutor" tabindex="-1" role="dialog" aria-labelledby=editAutor aria-hidden="true">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="labelEditar">Editar Autor</h4>
                </div>
                <div class="modal-body">
                    <form method="post" name="autorForm" onsubmit="return tiene_letras(document.forms['inputNombreAutor']['nombreAutor'].value)" id="inputNombreAutor" action="autorcp.php" class="form-horizontal" role="form">
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
                            <button type="submit" class="btn btn-primary" ">Aceptar</button>
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
                    <form method="post" onsubmit="return tiene_letras(document.forms['inputNombreAutor']['nombreAutor'].value)" id="inputNombreAutor" action="autorcp.php" class="form-horizontal" role="form">
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
>>>>>>> 8bcdcc199f9270ff4489d83d004a73a01850e6b2
    </div>