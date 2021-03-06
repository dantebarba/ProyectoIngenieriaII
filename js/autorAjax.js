$(document).ready( function() {
            var options = {
                        beforeSubmit:
                                function () {
                                    notyTopNotification('information', 'Espere...');
                                    $(".btn").prop("disabled", true);
                                },
                        success : function(element) {
                            // DISMISS MODAL AND PASS VALUE PARAMETER
                            
                            if (element.status === 'success') {
                                if (callerID !== null) {
                                    $("#agregarAutor").modal("hide");
                                    $(callerID).modal("show");
                                    $('#inputLinkAutor').append($('<option>', {
                                        value: element.id,
                                        text: element.nombre + ' - ' + element.dni
                                    }));
                                    $(callerID+ ' #inputLinkAutor').append($('<option>', {
                                        value: element.id,
                                        text: element.nombre + ' - ' + element.dni
                                    }));
                                    $(callerID+ ' #editLinkAutor').append($('<option>', {
                                        value: element.id,
                                        text: element.nombre + ' - ' + element.dni
                                    }));
                                    $(callerID+ ' #inputLinkAutor').val(element.id);
                                    $(callerID+ ' #editLinkAutor').val(element.id);
                                    callerID = null;
                                };
                                notyTopNotification('success', element.message); 
                            }
                            else if (element.status === 'error_autorExists') {
                                notyTopNotification('error', element.message);
                            }
                            $(".btn").prop("disabled", false);
                        },
                        error: function (element) {
                            console.log(element);
                        },
                        type : 'post',
                        dataType : 'json'
            };
            $("#inputDataAutor").ajaxForm(options);
    });