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
        Registrar nuevo usuario
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/jquery.form.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/jquery.validate.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/additional-methods.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/typeahead.jquery.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/typeahead.bundle.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="http://ingenieriaii.url.ph/css/datepicker.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"
          rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/typeaheadjs.css" rel="stylesheet">
    <link href="http://ingenieriaii.url.ph/css/custom.css"
    rel="stylesheet">
    <script type="text/javascript">
    $(document).ready(function() {
        $("#registrarFecha_nac").datepicker();
        
//        var provincia = ['Buenos Aires', 'Rio Negro', 'Mendoza', 'Neuquen', 'San Juan',
//        'Catamarca', 'La Rioja', 'Misiones', 'Chubut', 'Ushuaia', 'La Pampa', 'Salta',
//        'Jujuy', 'Formosa', 'Santiago Del Estero'];
//        
//        var prov = new Bloodhound({
//                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
//                        queryTokenizer: Bloodhound.tokenizers.whitespace,
//                        local: $.map(provincia, function(provincia) { return { value: provincia }; })
//        });
//        
//        prov.initialize();
//        
//        $("#registrarProvincia").typeahead(null, {
//          name: 'provincia',
//          displayKey: 'value',
//          source: prov.ttAdapter()
//        });
        
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
                    maxlength: 45
                    
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
                    email: true,
                    equalTo: "#registrarEmailrepeat"
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
                    required: true,
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
            registrarDNI: "Se requiere un DNI valido",
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
            beforeSubmit : valid,
            success : showMessage,
            error: showMessageError,
            type : 'post',
            dataType : 'json'
        }; 
        $("#registrarForm").ajaxForm(options); // ajax sumbit
   });   
   function showMessage(responseText) {
           alert(responseText.message);
       }
   function showMessageError(Error) {
       alert('ERROR');
   }
   function valid() {
            return $("#registrarForm").validate().form();
        }
    </script>
  </head>
  
  
  <body id="registrarse">
    <?php include 'header.php'; ?>
    <div class="container" >
      <div class="row" id="mainForm">
       <form id="registrarForm" name='registrarForm' action="registrarHandler.php">
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
              <input type="text" class="form-control" id="registrarUsername" name="registrarUsername">
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
            <input type="text" class="form-control" name="registrarEmail" id="registrarEmail">
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
          <div id="dateTime" class="form-group">
          <label>
            Fecha de Nacimiento
          </label>    
            <input data-format="dd/MM/yyyy" class="form-control" type="text" name="registrarFecha_nac" id="registrarFecha_nac">
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
                <label>
                    Localidad
                </label>
              <input type="text" class="form-control" name="registrarLocalidad" id="registrarLocalidad">
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
            <input type="text" class="form-control" name="registrarProvincia" id="registrarProvincia">
          </div>
          <div class="form-group pull-left">
            <label>
              Codigo Postal
            </label>
            <input type="text" class="form-control" name="registrarPostal" id="registrarPostal">
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
    </div>
  </body>
</html>



