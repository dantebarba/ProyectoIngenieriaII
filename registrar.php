<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
  <head> 
    <meta charset="utf-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css"
    rel="stylesheet">
    <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"
          rel="stylesheet">
    <link href="http://ingenieriaii.url.ph/css/custom.css"
    rel="stylesheet">
    <script type="text/javascript">
        $(document).on("change", "#registrarIsDepto", function() {
           if ($("#registrarIsDepto").val() === 'yes') {
               $("#registrarDepartamento").prop('disabled', false);
           }
           else {
               $("#registrarDepartamento").prop("disabled", true);
           }
       });
       $("#registrarForm").sumbit(function(e) {
         var postData = $(this).serializeArray();
         var formURL = $(this).attr("action");
         $.ajax(
         {
             url : formURL,
             type: "POST",
             data : postData,
             success:function(data, textStatus, jqXHR) 
             {
                 alert("gracias por registrarse");
             },
             error: function(jqXHR, textStatus, errorThrown) 
             {
                 alert("PHP RETURN HERE");    
             }
         });
         e.preventDefault(); //STOP default action
         e.unbind(); //unbind. to stop multiple form submit.
       });
    </script>
  </head>
  
  
  <body id="registrarse">
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
            <input type="text" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label>
              Repita Contraseña
            </label>
            <input type="text" class="form-control" name="password-repeat">
          </div>
          <div class="form-group">
            <label>
              E-mail
            </label>
            <input type="text" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label>
              Repita E-mail
            </label>
            <input type="text" class="form-control" name="email-repeat">
          </div>
          <div class="form-group">
            <label>
              Género
            </label>
            <select class="form-control">
              <option value="m">
                Masculino
              </option>
              <option value="f">
                Femenino
              </option>
              <option value="">
              </option>
            </select>
          </div>
          <h3>
          </h3>
          <div class="form-group">
            <label>
              DNI
            </label>
              <input type="text" class="form-control" placeholder="40555222">
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
              <label>
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
                Localidad
              </label>
              <input type="text" class="form-control" name="localidad">
            </div>
          
          <div class="form-group">
            <label>
              Calle
            </label>
            <input type="text" class="form-control" name="calle" placeholder="Av. Libertador">
          </div>
          <div class="form-group">
            <label>
              Numero
            </label>
            <input type="text" class="form-control" name="numero" placeholder="4311">
          </div>
          <div class="form-group">
            <label>
              ¿Su domicilio es un departamento?
            </label>
            <select class="form-control" name="registrarIsDepto" id="registrarIsDepto" >
              <option value="no">
                No
              </option>
              <option value="yes">
                Si
              </option>
              <option value="">
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
            <input type="text" class="form-control" name="provincia">
          </div>
          <div class="form-group pull-left">
            <label>
              Codigo Postal
            </label>
            <input type="text" class="form-control" name="postal">
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
          <button type="button" class="btn btn-info pull-left" id="clearFields" name="clear">
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



