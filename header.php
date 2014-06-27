<body>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="inciarSesion">Iniciar Sesi&oacute;n</h4>
                </div>
                <div class="modal-body" >
                    <div class="modal-body" id="loginModal"></div>
                    <form method="post" action="login.php" class="form-horizontal" id='loginForm' name="loginForm" role="form">
                        <div class="form-group">
                            <label for="user" class="col-sm-2 control-label" >Usuario</label>
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
                                <button type="button" class="btn btn-primary" id="btnLogIn" onClick='$("#loginForm").submit();'>Conectarse</button>
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
                <a class="navbar-brand" href="/index.php">Cookbook</a> </div>
            <ul class="nav navbar-nav navbar-right"><?php
                if (isset($_COOKIE['username']) and ($_COOKIE['username'] != '')) {
                    if (isset($_COOKIE['isAdmin']) && ($_COOKIE['isAdmin'] != '')) {
                        echo "<li><a href='"."/administrador/admincp.php"."'>Admin CP</a></li>";
                    }
                    //echo "<li><a href="."#".">Carrito</a></li>";
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
    <script type="text/javascript" src="/js/noty/packaged/jquery.noty.packaged.min.js"></script>
        <script src="/js/jquery.form.js" type="text/javascript"></script>
        <script type="text/javascript">
                // LOGIN SCRIPT
                $(document).ready(function() {
                    $("#messageBox").hide();
                    var options = {
                        beforeSubmit: function() {
                            $("#btnLogIn").prop("disabled", true);
                            $('#loginModal').noty(
                                        {   layout: 'inline',
                                            text: 'Iniciando Sesion...',
                                            timeout: false,
                                            type: 'information',
                                            closeWith: ['button']
                                        });
                        },
                        success : function(element) { 
                            $.noty.closeAll();
                            notyoptions = { layout: 'inline',
                                            text: element.message,
                                            timeout: '3000',
                                            type: 'error'
                                          };
                            if (element.status === 'success') {
                                window.location.href = element.redirect;
                            }
                            else if ((element.status === 'error_invalidLogin') || 
                                     (element.status === 'error_userDisabled'))
                            {
                                $('#loginModal').noty(notyoptions);
                            }
                            $("#btnLogIn").prop("disabled", false);
                            // sucess envia Objeto json
                        },
                        error: function (element) {
                            console.log(element);
                            noty({text: 'ERROR EN EL SERVIDOR', type: 'error'});
                        },
                        type : 'post',
                        dataType : 'json'
                    }; 
                    $("#loginForm").ajaxForm(options);
                });
                
            </script>
