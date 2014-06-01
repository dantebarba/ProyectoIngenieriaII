<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
  <head>
    <script> src="js/jquery-2.1.1.min.js" type="text/javascript"</script>
      <script>
        $(window).resize(function () { 
        $('body').css('padding-top', parseInt($('#main-navbar').css("height"))+10);
            });

        $(window).load(function () { 
        $('body').css('padding-top', parseInt($('#main-navbar').css("height"))+10);        
        });
      </script>  
    <meta charset="utf-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"
    rel="stylesheet">
  </head>
  
  
  <body>
    <div class="container" >
      <div class="row">
      </div>
      <div class="row" id="mainForm">
        <div class="col-md-4">
          <h3>
            Registrar nuevo usuario
          </h3>
          <form>
            <div class="form-group">
              <label>
                Usuario
              </label>
              <input type="text" class="form-control" name="username">
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
            <input type="text" class="form-control">
          </div>
         </form>
        </div>
        <div class="col-md-8">
          <h3>
            Domicilio
          </h3>
          <p>
            Complete los campos.
          </p>
          <form>
            <div class="form-group">
              <label>
                <div class="form-group">
                  <label>
                    Telefono fijo
                  </label>
                  <input type="text" class="form-control" value="01144421111" name="tel">
                </div>
                <div class="form-group">
                  <label>
                    Telefono celular
                  </label>
                  <input type="text" class="form-control" value="0221552111" name="telcel">
                </div>
                Localidad
              </label>
              <input type="text" class="form-control" name="localidad">
            </div>
          
          <div class="form-group">
            <label>
              Calle
            </label>
            <input type="text" class="form-control" name="calle">
          </div>
          <div class="form-group">
            <label>
              Numero
            </label>
            <input type="text" class="form-control" name="numero">
          </div>
          <div class="form-group">
            <label>
              ¿Su domicilio es un departamento?
            </label>
            <select class="form-control" name="isDepartamento">
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
            <input type="text" class="form-control" name="departamento">
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
          </form>
        </div>
          
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
           <button type="submit" class="btn pull-right btn-primary" id="sendForm" name="sendform">Enviar</button>
          <button type="button" class="btn pull-right btn-danger" id="cancel" name="cancel">
            Canelar
          </button>
            </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"
    >
    </script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"
    >
    </script>
  </body>

</html>