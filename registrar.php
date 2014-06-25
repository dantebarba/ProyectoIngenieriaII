<?php 
    include 'restricted/securitycheck.php';
    if (loginCheck()) {
        header('Location: index.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
    <title>
        Registrarse
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
    <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="http://ingenieriaii.url.ph/css/bootstrap.icon-large.min.css" rel="stylesheet">
    <link href="http://ingenieriaii.url.ph/css/datepicker.css" rel="stylesheet">
    <link href="http://ingenieriaii.url.ph/css/custom.css"
    rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function() {
            $("#messagebox").hide();
            $(document).on("change", "#registrarIsDpto", function() {
               if ($("#registrarIsDpto").val() === "1") {
                   $("#registrarDepartamento").prop('disabled', false);
               }
               else {
                   $("#registrarDepartamento").prop("disabled", true);
               }
            });
            $("#registrarForm").validate(       
            {
                rules: {
                    registrarUsername: {
                        required: true,
                        minlength: 4,
                        maxlength: 45,
                        alphanumeric: true

                    },
                    registrarPassword: {
                        required: true,
                        minlength: 5
                    },
                    registrarPasswordrepeat: {
                        required: true,
                        equalTo: "#registrarPassword"
                    },
                    registrarEmail: {
                        required: true,
                        email: true
                    },
                    registrarEmailrepeat: {
                        required: true,
                        email: true,
                        equalTo: "#registrarEmail"
                    },
                    registrarDNI: {
                        required: true,
                        digits: true,
                        minlength: 5
                    },
                    registrarFecha_nac: {
                        required: true
                    },
                    registrarTel_fijo: {
                        digits: true
                    },
                    registrarTel_cel: {
                        digits: true
                    },
                    registrarLocalidad: {
                        required: true
                    },
                    registrarCalle: {
                        required: true
                    },
                    registrarNumero: {
                        required: true,
                        digits: true
                    },
                    registrarProvincia: {
                        required: true
                    },
                    registrarPostal: {
                        required: true,
                        digits: true
                    }
            },

            // Specify the validation error messages
            messages: {
                registrarUsername: {
                    required: "Se requiere un nombre de usuario",
                    minlength: "La longitud minima es de 5 caracteres",
                    maxlength: "La longitud maxima es de 45 caracteres",
                    alphanumeric: "Ha ingresado caracteres no validos"
                },
                registrarPassword: {
                    required: "Por favor ingrese una contrasenia",
                    minlength: "Tu password debe ser de entre 5 y 32 caracteres"
                },
                registrarPasswordrepeat: {
                    equalTo: "Tu contrasenia no coincide"
                },
                registrarEmail: "Por favor ingrese un email valido",
                registrarEmailrepeat: "Las direcciones de Email no coinciden",
                registrarDNI: {
                    digits: "Solo se pueden ingresar numeros",
                    required: "Este campo es requerido",
                    minlength: "Se requieren como minimo cinco digitos"
                },
                registrarTel_fijo: "Se requiere un telefono fijo, introducir solo numeros",
                registrarTel_cel: "Solo se admiten numeros",
                registrarCalle: "Se requiere ingresar una calle",
                registrarProvincia: "Se requiere seleccionar una provincia",
                registrarLocalidad: "Se requiere ingresar su localidad",
                registrarPostal: "Se requiere su codigo postal",
                registrarNumero: "Se requiere el numero de la ubicacion",
                registrarFecha_nac: "Se requiere una fecha de nacimiento valida"
            }, 
            highlight: function(element) {
                $(element).addClass('error');
            }, 
            unhighlight: function(element) {
                $(element).removeClass('error');
            }    
            }); // close validate

            var options = {
                beforeSubmit : valid, //checkeamos si la forma es valida
                success : showMessage, // sucess envia Objeto json
                error: showMessageError,
                type : 'post',
                dataType : 'json'
            }; 
            $("#registrarForm").ajaxForm(options); // ajax sumbit
       });   
       function showMessage(responseText) {
           if (responseText.status === 'success') {
              $("#messagebox").addClass('alert-success');
              $("#messageText").text('');
              $("#messageText").append($.parseHTML(responseText.message));
              $("#messagebox").show(2000 , function() {
               setTimeout(function() {
                  $("#messagebox").removeClass('alert-success');
                  window.location.href='/index.php'; 
               }, 3000);
              }); 
          }
            else if (responseText.status === 'error_userExists'){
                showMessageError(responseText);
          }
       }
       function showMessageError(Error) {
           console.log(Error);
           $("#messagebox").addClass('alert-danger');
           $("#messageText").text('');
           $("#messageText").append($.parseHTML(Error.message));
           $("#messagebox").show(2000 , function() {
               setTimeout(function() {
                    $("#messagebox").hide();
                    $("#messagebox").removeClass("alert-danger");
                }, 3000);
            });
        }
       function valid() {
                return $("#registrarForm").validate().form();
            }
    </script>
  </head>
  
  <?php include 'header.php';?>
  <body id="registrarse" >
    <div class="navbar-fixed-top alert" id="messagebox" style="z-index: 2;">
                <div class="message">
                    <div class="message-inside">
                      <span class="message-text" id='messageText'>  
                      </span>
                    </div>
                 </div>
    </div>        
    <div class="container" id="mainContainer" > 
      <div class="row" id="mainForm">
       <form id="registrarForm" name='registrarForm' action="registrarHandler.php" role="form">
          <div class="col-md-2">
              
          </div>
        <div class="col-md-4">
          <h3>
            Registrar nuevo usuario
          </h3>
            
            <div class="form-group">
              <label>
                Usuario
              </label>
              <input type="text" class="form-control" id="registrarUsername" name="registrarUsername" placeholder="NombreDeUsuario">
            </div>
          
          <div class="form-group">
            <label>
              Contraseña
            </label>
            <input type="password" class="form-control" name="registrarPassword" id="registrarPassword">
          </div>
          <div class="form-group">
            <label>
              Repita Contraseña 
            </label>
              
            <input type="password" class="form-control" name="registrarPasswordrepeat" id="registrarPasswordrepeat">
          </div>
          <div class="form-group">
            <label>
              E-mail
            </label>
              <input type="text" class="form-control" name="registrarEmail" id="registrarEmail" placeholder="ejemplo@hostejemplo.com">
          </div>
          <div class="form-group">
            <label>
              Repita E-mail
            </label>
            <input type="text" class="form-control" name="registrarEmailrepeat" id="registrarEmailrepeat">
          </div>
          <div class="form-group">
            <label>
              Género
            </label>
            <select class="form-control" id="registrarGenero" name="registrarGenero">
              <option value="m">
                Masculino
              </option>
              <option value="f">
                Femenino
              </option>
            </select>
          </div>
          <h3>
          </h3>
          <div class="form-group">
            <label>
              DNI
            </label>
              <input type="text" id="registrarDNI" name="registrarDNI" class="form-control" placeholder="40555222">
          </div>
          <label>
            Fecha de Nacimiento
          </label> 
            <div class="form-group has-feedback">
                <input type="text" id="fechaNac" class="form-control" readonly placeholder="dd/mm/yyyy">
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
                    <input type="text" class="form-control" placeholder="01143331212" id="registrarTel_fijo" name="registrarTel_fijo">
                </div>
                <div class="form-group">
                  <label>
                    Telefono celular
                  </label>
                  <input type="text" class="form-control" placeholder="0221552111" id="registrarTel_cel" name="registrarTel_cel">
                </div>
                <input type="hidden" id="phoneset">
                <label>
                    Localidad
                </label>
              <input type="text" class="form-control" placeholder="Zarate" name="registrarLocalidad" id="registrarLocalidad">
            </div>
          
          <div class="form-group">
            <label>
              Calle
            </label>
            <input type="text" class="form-control" id="registrarCalle" name="registrarCalle" placeholder="Av. Libertador">
          </div>
          <div class="form-group">
            <label>
              Numero
            </label>
            <input type="text" class="form-control" id="regisrrarNumero" name="registrarNumero" placeholder="4311">
          </div>
          <div class="form-group">
            <label>
              ¿Su domicilio es un departamento?
            </label>
            <select class="form-control" name="registrarIsDpto" id="registrarIsDpto" >
              <option value=0>
                No
              </option>
              <option value=1>
                Si
              </option>
            </select>
          </div>
          <div class="form-group">
            <label>
              Nro. de departamento
            </label>
              <input type="text" class="form-control" disabled  id="registrarDepartamento" name="registrarDepartamento" placeholder="3A">
          </div>
          <div class="form-group">
            <label>
              Provincia
            </label>
            <input type="text" class="form-control" placeholder="Buenos Aires" name="registrarProvincia" id="registrarProvincia">
          </div>
          <div class="form-group pull-left">
            <label>
              Codigo Postal
            </label>
              <input type="text" class="form-control" placeholder="1900" name="registrarPostal" id="registrarPostal">
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
          <button type="button" class="btn btn-info pull-left" id="clearFields" onClick='$("#registrarForm").validate().resetForm()' name="clearFields">
              Limpiar formulario
          </button>
            <div>
          <span style="float: right;">
           <button type="button" class="btn pull-right btn-primary" id="sendForm" name="sendform" onClick='$("#registrarForm").submit();'>Enviar</button>
           <button type="button" class="btn pull-right btn-danger" id="cancel" name="cancel">
            Canelar
          </button>
            </div>
        </div>
      </div>
        <script type="text/javascript">
            $("#fechaNac").datepicker();
        </script>
    </div>
  </body>
</html>



