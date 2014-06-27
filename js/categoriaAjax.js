

    $(document).ready( function() {
            callerID = $("#fromModal").val();
            var options = {
                        beforeSubmit:
                                function () {
                                    $(".btn").prop("disabled", true);
                                    notyTopNotification('information', 'Espere...');
                                },
                        success : function(element) { 
                            // DISMISS MODAL AND PASS VALUE PARAMETER
                            if (element.status === 'success') {
                                if ($("#fromModal").val() !== "0") {
                                    $("#fromModal").val("0");
                                    $("#agregarCategoria").modal("hide");
                                    $(callerID).modal("show");
                                    $(callerID+' #editLinkEtiqueta').append($('<option>', {
                                        value: element.id,
                                        text: element.nombre + '-' + element.dni
                                    }));
                                    $(callerID+' #inputLinkEtiqueta').append($('<option>', {
                                        value: element.id,
                                        text: element.nombre + '-' + element.dni
                                    }));
                                    $(callerID+' #inputLinkEtiqueta').val(element.id);
                                    $(callerID+' #editLinkEtiqueta').val(element.id);
                                   
                                };
                                notyTopNotification('success', element.message);
                            }
                            else if (element.status === 'error_categoriaExists') {
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
            $("#inputNombreEtiqueta").ajaxForm(options);
    
    });

