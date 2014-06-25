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
        