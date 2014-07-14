<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="utf-8">
        <title>
            Editar Usuario
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="http://ingenieriaii.url.ph/js/jquery.form.js" type="text/javascript"></script>
        <script src="http://ingenieriaii.url.ph/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="http://ingenieriaii.url.ph/js/jquery.validate.js" type="text/javascript"></script>
        <script src="http://ingenieriaii.url.ph/js/additional-methods.js" type="text/javascript"></script>
        <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/noty/packaged/jquery.noty.packaged.min.js"></script>
        <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css"
              rel="stylesheet">
        <link href="http://ingenieriaii.url.ph/css/bootstrap.icon-large.min.css" rel="stylesheet">
        <link href="http://ingenieriaii.url.ph/css/datepicker.css" rel="stylesheet">
        <link href="http://ingenieriaii.url.ph/css/custom.css"
              rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(function() {


                $(document).on("change", "#editarIsDpto", function() {
                    if ($("#editarIsDpto").val() === "1") {
                        $("#editarDepartamento").prop('disabled', false);
                    }
                    else {
                        $("#editarDepartamento").prop("disabled", true);
                    }
                });
                $("#editarForm").validate(
                        {
                            rules: {
                                editarUsername: {
                                    required: true,
                                    minlength: 4,
                                    maxlength: 45,
                                    alphanumeric: true

                                },
                                editarPassword: {
                                    required: true,
                                    rangelength: [5, 32],
                                    alphanumeric: true
                                },
                                editarPasswordrepeat: {
                                    required: true,
                                    equalTo: "#editarPassword",
                                    alphanumeric: true
                                },
                                editarEmail: {
                                    minlength: 5,
                                    maxlength: 40,
                                    required: true,
                                    email: true
                                },
                                editarEmailrepeat: {
                                    required: true,
                                    email: true,
                                    equalTo: "#editarEmail"
                                },
                                editarDNI: {
                                    required: true,
                                    digits: true,
                                    minlength: 5,
                                    maxlength: 10,
                                    range: [100, 999999999]
                                },
                                editarFecha_nac: {
                                    required: true
                                },
                                editarTel_fijo: {
                                    required: function(element) {
                                        if ($("#editarTel_cel").val() === '') {
                                            return true;
                                        }
                                        else {
                                            return false;
                                        }
                                    },
                                    digits: true,
                                    range: [0, 99999999999999]
                                },
                                editarTel_cel: {
                                    required: function(element) {
                                        if ($("#editarTel_fijo").val() === '') {
                                            return true;
                                        }
                                        else {
                                            return false;
                                        }
                                    },
                                    digits: true,
                                    range: [0, 99999999999999]
                                },
                                editarLocalidad: {
                                    required: true,
                                    maxlength: 45
                                },
                                editarCalle: {
                                    required: true,
                                    maxlength: 45
                                },
                                editarNumero: {
                                    required: true,
                                    digits: true,
                                    range: [1, 999999]

                                },
                                editarProvincia: {
                                    required: true,
                                    maxlength: 40
                                },
                                editarPostal: {
                                    required: true,
                                    digits: true,
                                    range: [1, 10000]
                                },
                                editarDepartamento: {
                                    required: function(element) {
                                        if ($("#editarIsDpto").val() === "1") {
                                            return true;
                                        }
                                        else {
                                            return false;
                                        }
                                    },
                                    maxlength: 5
                                }
                            },
                            // Specify the validation error messages
                            messages: {
                                editarUsername: {
                                    required: "Se requiere un nombre de usuario",
                                    minlength: "La longitud minima es de 5 caracteres",
                                    maxlength: "La longitud maxima es de 45 caracteres",
                                    alphanumeric: "Ha ingresado caracteres no validos"
                                },
                                editarPassword: {
                                    required: "Por favor ingrese una contrasenia",
                                    rangelength: "Tu password debe ser de entre {0} y {1} caracteres"
                                },
                                editarPasswordrepeat: {
                                    equalTo: "Tu contrasenia no coincide",
                                    required: "Se requiere repetir el password"
                                },
                                editarEmail: "Por favor ingrese un email valido",
                                editarEmailrepeat: "Las direcciones de Email no coinciden",
                                editarDNI: {
                                    digits: "Solo se pueden ingresar numeros",
                                    required: "Este campo es requerido",
                                    minlength: "Se requieren como minimo cinco digitos",
                                    maxlength: "No ingrese mas de {0} caracteres",
                                    range: "Inserte un DNI valido"
                                },
                                editarTel_fijo: {
                                    digits: "Solo se admiten numeros",
                                    required: "Se requiere un numero telefonico",
                                    range: "Numero telefonico fuera de rango"
                                },
                                editarTel_cel: {
                                    digits: "Solo se admiten numeros",
                                    required: "Se requiere un numero telefonico",
                                    range: "Numero telefonico fuera de rango"
                                },
                                editarCalle: "Se requiere ingresar una calle",
                                editarProvincia: "Se requiere seleccionar una provincia",
                                editarLocalidad: "Se requiere ingresar su localidad",
                                editarPostal: "Se requiere su codigo postal",
                                editarNumero: "Se requiere el numero de la ubicacion",
                                editarFecha_nac: "Se requiere una fecha de nacimiento valida",
                                editarDepartamento: "Se requiere ingresar un numero de departamento"
                            },
                            highlight: function(element) {
                                $(element).addClass('error');
                            },
                            unhighlight: function(element) {
                                $(element).removeClass('error');
                            }
                        }); // close validate

                var options = {
                    beforeSubmit: function() {
                        if (valid()) {
                            var not = noty({
                                layout: 'topCenter',
                                text: 'Por favor espere...',
                                closeWith: ['button'],
                                type: 'information'
                            });
                        }
                    }, //checkeamos si la forma es valida
                    success: function(element) {
                        $.noty.closeAll();
                        if (element.status === 'success') {
                            var not = noty(
                                    {layout: 'topCenter',
                                        text: element.message,
                                        timeout: '3000',
                                        type: 'success',
                                        callback: {
                                            onClose: function() {
                                                window.location.href = 'index.php';
                                            }
                                        }

                                    });
                        }
                        else if (element.status === 'error_userExists') {
                            var not = noty(
                                    {layout: 'topCenter',
                                        text: element.message,
                                        timeout: '3000',
                                        type: 'error'

                                    });
                        }
                        else if (element.status === 'error_userDisabled') {
                            var not = noty(
                                    {layout: 'topCenter',
                                        text: element.message,
                                        timeout: '5000',
                                        type: 'error'

                                    });
                        }
                    }, // sucess envia Objeto json
                    error: function(element) {
                        console.log(element);
                        var not = noty(
                                {layout: 'topCenter',
                                    text: 'UNEXPECTED ERROR, TRY AGAIN LATER',
                                    timeout: '3000',
                                    type: 'error'
                                });
                    },
                    type: 'post',
                    dataType: 'json'
                };
                $("#editarForm").ajaxForm(options); // ajax sumbit
            });
            function valid() {
                return $("#editarForm").validate().form();
            }
        </script>
    </head>
    <?php
    include 'header.php';
    include 'dbconnection.php';
    $link = connectdb();
    include 'queries.php';
    $usuario = q_getUsuario($_COOKIE['username']);
    $direccion = q_getDireccion($_COOKIE['username']);
    $rowdir = mysql_fetch_array($direccion);
    $row = mysql_fetch_array($usuario);
    ?>
    <body id="editarse" >
        <div id="messageDiv"></div>
        <div class="container" id="mainContainer" > 
            <div class="row" id="mainForm">
                <form id="editarForm" name='editarForm' action="/inc/editarHandler.php" role="form">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-4">
                        <h3>
                            Editar datos
                        </h3>
                        <div class="form-group">
                            <label>
                                Usuario
                            </label>
                            <input type="text" readonly value="<?php echo $row[username]; ?>" class="form-control" id="editarUsername" name="editarUsername" placeholder="NombreDeUsuario">
                        </div>

                        <div class="form-group">
                            <label>
                                Contraseña
                            </label>
                            <input type="password" value="<?php echo $row[password]; ?>" class="form-control" name="editarPassword" id="editarPassword">
                        </div>
                        <div class="form-group">
                            <label>
                                Repita Contraseña 
                            </label>

                            <input type="password" value="<?php echo $row[password]; ?>" class="form-control" name="editarPasswordrepeat" id="editarPasswordrepeat">
                        </div>
                        <div class="form-group">
                            <label>
                                E-mail
                            </label>
                            <input type="text" class="form-control" value="<?php echo $row[email]; ?>"name="editarEmail" id="editarEmail" placeholder="ejemplo@hostejemplo.com">
                        </div>
                        <div class="form-group">
                            <label>
                                Repita E-mail
                            </label>
                            <input type="text" class="form-control" value="<?php echo $row[email]; ?>"name="editarEmailrepeat" id="editarEmailrepeat">
                        </div>
                        <div class="form-group">
                            <label>
                                Género
                            </label>
                            <select class="form-control"  id="editarGenero" name="editarGenero">
                                <?php
                                if ($row[genero] == "f") {
                                    echo'
              <option value="m" id="masc" name="masc">
                Masculino
              </option>
              <option selected value="f" id="fem" name="fem">
                Femenino
                    </option>';
                                } else {
                                    echo '<option selected value="m" id="masc" name="masc">
                Masculino
              </option>
              <option value="f" id="fem" name="fem">
                Femenino
              </option>'
                                    ;
                                }
                                ?>
                            </select>
                        </div>
                        <h3>
                        </h3>
                        <div class="form-group">
                            <label>
                                DNI
                            </label>
                            <input type="text" readonly value="<?php echo $row[DNI]; ?>" id="editarDNI" name="editarDNI" class="form-control" placeholder="40555222">
                        </div>
                        <label>
                            Fecha de Nacimiento
                        </label> 
                        <div class="form-group has-feedback">
                            <input type="text" value="<?php echo $row[fecha_nac]; ?>" id="editarFecha_nac" name="editarFecha_nac" class="form-control" readonly placeholder="dd/mm/yyyy">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3>
                            Domicilio
                        </h3>
                        <p>
                            Complete los campos.
                        </p>
                        <div class="form-group">

                            <div class="form-group">
                                <label>
                                    Telefono fijo
                                </label>
                                <input type="text" value="<?php echo $row[tel_fijo]; ?>" class="form-control" placeholder="01143331212" id="editarTel_fijo" name="editarTel_fijo">
                            </div>
                            <div class="form-group">
                                <label>
                                    Telefono celular
                                </label>
                                <input type="text" value="<?php echo $row[tel_cel]; ?>" class="form-control" placeholder="0221552111" id="editarTel_cel" name="editarTel_cel">
                            </div>
                            <label>
                                Localidad
                            </label>
                            <input type="text" value="<?php echo $rowdir[localidad]; ?>" class="form-control" placeholder="Zarate" name="editarLocalidad" id="editarLocalidad">
                        </div>

                        <div class="form-group">
                            <label>
                                Calle
                            </label>
                            <input type="text" value="<?php echo $rowdir[calle]; ?>" class="form-control" id="editarCalle" name="editarCalle" placeholder="Av. Libertador">
                        </div>
                        <div class="form-group">
                            <label>
                                Numero
                            </label>
                            <input type="text" value="<?php echo $rowdir[numero]; ?>" class="form-control" id="editarNumero" name="editarNumero" placeholder="4311">
                        </div>
                        <div class="form-group">
                            <label>
                                ¿Su domicilio es un departamento?
                            </label>
                            <select class="form-control" name="editarIsDpto" id="editarIsDpto" >
                                <?php
                                if ($rowdir['departamento'] == "0") {
                                    echo'<option selected value=0 name="no" id="no">
                No
              </option>
              <option value=1 name="si" id="si">
                Si
                    </option>';
                                } else {
                                    echo'<option  value=0 name="no" id="no">
                No
              </option>
              <option selected value=1 name="si" id="si">
                Si
              </option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                Nro. de departamento
                            </label>
                            <?php
                            if ($rowdir[departamento] == "0") {
                                echo'<input type="text" class="form-control" disabled  id="editarDepartamento" name="editarDepartamento">';
                            } else {
                                echo '<input type="text" value="' . $rowdir[numDpto] . '" class="form-control" id="editarDepartamento" name="editarDepartamento" >';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>
                                Provincia
                            </label>
                            <input type="text" value="<?php echo $rowdir[provincia]; ?>" class="form-control" placeholder="Buenos Aires" name="editarProvincia" id="editarProvincia">
                        </div>
                        <div class="form-group pull-left">
                            <label>
                                Codigo Postal
                            </label>
                            <input type="text" value="<?php echo $rowdir[codPostal]; ?>" class="form-control" placeholder="1900" name="editarPostal" id="editarPostal">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                </form>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <button type="button" class="btn btn-info pull-left" id="clearFields" onClick='$("#editarForm").validate().resetForm()' name="clearFields">
                        Datos previos
                    </button>
                    <a href="deluser.php" type="button" class="btn btn-danger" id="eliminarUsuario" name="eliminarUsuario" >Eliminar usuario</a>
                    <span style="float: right;">
                        <button type="button" class="btn pull-right btn-primary" id="sendForm" name="sendform" onClick='$("#editarForm").submit();'>Enviar</button>
                        <a href="index.php" type="button" class="btn pull-right btn-danger" id="cancel" name="cancel" >Cancelar</a>
                </div>
            </div>
            <script type="text/javascript">
                var nowTemp = new Date();
                var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                $("#editarFecha_nac").datepicker({
                    onRender: function(date) {
                        return date.valueOf() > now.valueOf() ? 'disabled' : '';
                    }
                });
            </script>
        </div>
    </body>
</html>




