

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
        Recuperar cuenta
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="http://ingenieriaii.url.ph/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/jquery.form.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/jquery.validate.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/additional-methods.js" type="text/javascript"></script>
    <script src="http://ingenieriaii.url.ph/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <link href="http://ingenieriaii.url.ph/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="http://ingenieriaii.url.ph/css/bootstrap.icon-large.min.css" rel="stylesheet">
    <link href="http://ingenieriaii.url.ph/css/custom.css"
    rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function () {
            $("#recoverUsername").on('blur', function() {
               if ($(this).val() === '') {
                   $("#recoverDNI").prop("disabled", false);
               }
               else {
                   $("#recoverDNI").prop("disabled", true);
               }
            });
            $("#recoverDNI").on('blur', function() {
               if ($(this).val() === '') {
                   $("#recoverUsername").prop("disabled", false);
               }
               else {
                   $("#recoverUsername").prop("disabled", true);
               }
            });
            $("#recoverForm").validate(       
            {
                rules: {
                    recoverUsername: 
                    {
                        required:  function () {
                            if ($("#recoverDNI").val() === '')
                                return true;
                            else {
                                return false;
                            }
                        }
                    },
                    recoverDNI: {
                        required: function () {
                            if ($("#recoverUsername").val() === '')
                                return true;
                            else {
                                return false;
                            }
                        },           
                        digits: true
                    }
                }
            });
            var options = {
                beforeSubmit : function() {
                    if (valid()) {
                        var not = noty({
                            layout: 'topCenter',
                            text: 'Por favor espere...',
                            closeWith: ['button'],
                            type: 'information'
                        });
                        $("#sendRecoverForm").prop("disabled", true);
                    }
                }, //checkeamos si la forma es valida
                data: { mode: 'enableaccount' }, // cuando se utilice el recover password
                // mode: deberia seleccionarse diamicamente
                success : function(element) { 
                    $.noty.closeAll();
                    if (element.status === 'success') {
                                    var not = noty(
                                        {   layout: 'topCenter',
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
                    else if (element.status === 'error_invalidLogin') {
                                    var not = noty(
                                        {   layout: 'topCenter',
                                            text: element.message,
                                            timeout: '3000',
                                            type: 'error'
                                            
                                        });
                    }
                    $("#sendRecoverForm").prop("disabled", false);
                },// sucess envia Objeto json
                error: function (element) {
                                    console.log(element);
                                    var not = noty(
                                        {   layout: 'topCenter',
                                            text: 'UNEXPECTED ERROR, TRY AGAIN LATER',
                                            timeout: '3000',
                                            type: 'error'
                                        }); 
                },
                type : 'get',
                dataType : 'json'
            }
            function valid () {
                return $("#recoverForm").validate().form();
            }
            $("#recoverForm").ajaxForm(options);
        });
    </script>
  </head>

<?php include 'header.php';?>
  <body>
      <div class="container">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            
            <form  name='recoverForm' action="login.php" id="recoverForm" role="form" style="padding-top: 200px;">
                <div class="form-group">
                    <h5> Complete con su DNI o su Nombre de Usuario</h5>
                    <div class="form-group">
                        <label for="recoverUsername"> Usuario </label>
                        <input type="text" class="form-control" id="recoverUsername" name="recoverUsername" />
                        </div>
                        <div class="form-group">
                        <label for="recoverDNI"> DNI </label>
                        <input type="number" class="form-control" id="recoverDNI" name="recoverDNI" />
                    </div>
                </div>
            </form>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <span style="float: right;">
                         <button type="button" class="btn pull-right btn-primary" id="sendRecoverForm" name="sendRecoverForm" onClick='$("#recoverForm").submit();'>Enviar</button>
                         <button type="button" class="btn pull-right btn-danger" onClick="window.location.href = '/index.php'">
                                Canelar
                        </button>
                        </span>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
      </div>
      
      
  </body>

