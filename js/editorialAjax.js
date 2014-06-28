

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
                                    $("#agregarEditorial").modal("hide");
                                    $(callerID).modal("show");
                                    $(callerID + ' #inputLinkEditorial').append($('<option>', {
                                        value: element.id,
                                        text: element.nombre
                                    }));
                                    $(callerID + ' #editLinkEditorial').append($('<option>', {
                                        value: element.id,
                                        text: element.nombre
                                    }));
                                    $(callerID + ' #editLinkEditorial').val(element.id);
                                    $(callerID + ' #inputLinkEditorial').val(element.id);
                                    callerID = null;
                                };
                                notyTopNotification('success', element.message);
                                callerID = null;
                           }
                            else if (element.status === 'error_editorialExists') {
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
            $("#inputDataEditorial").ajaxForm(options);

    });