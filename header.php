
<body>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="inciarSesion">Iniciar Sesi&oacute;n</h4>
                </div>
                <div class="modal-body">

                    <form method="post" action="login.php" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="user" class="col-sm-2 control-label">Usuario</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user" name="user" placeholder="tu usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Contrase&ntilde;a</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="tu contrase&ntilde;a">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Conectarse</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal -->
    <script type="text/javascript">
        function logout() {
            window.location.href="/login.php?mode=logout";
        }
    </script>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://ingenieriaii.url.ph/">Cookbook</a> </div>
            <ul class="nav navbar-nav navbar-right"><?php
                if (isset($_COOKIE['username']) and ($_COOKIE['username'] != '')) {
                    if (isset($_COOKIE['isAdmin']) && ($_COOKIE['isAdmin'] != '')) {
                        echo "<li><a href='"."administrador/admincp.php"."'>Admin CP</a></li>";
                    }
                    echo "<li><a href="."#".">Carrito</a></li>";
                    echo '<li><a <span style="float: right;">Bienvenido '.$_COOKIE["username"].' - <button type="button"
                        class="btn btn-success btn-xs" onClick="logout()"'.
                        '>Log out</button></span></a></li>';
                }
                else {
                    echo "<li><a href="."registrar.php".">Registrarse</a></li>";
                    echo'<li><a <span style="float: right;">No est&aacute;s conectado - '
                        . '<button type="button" class="btn btn-success btn-xs" data-toggle="modal" '
                        . 'data-target="#login">Log in</button></span></a></li>';
                }
                ?>
            </ul>

        </div>
    </div>
