$(document).ready( function() {
            var options = {
                        beforeSubmit:
                                function () {
                                    $("#enviarAutor").prop("disabled", true);
                                },
                        success : function(element) { 
                            // DISMISS MODAL AND PASS VALUE PARAMETER
                            if (element.status === 'success') {
                                if (($("#fromModal").val()) === "1") {
                                    $("#agregarAutor").modal("hide");
                                    $("#agregarLibro").modal("show");
                                    $('#inputLinkAutor').append($('<option>', {
                                        value: element.id,
                                        text: element.nombre + '-' + element.dni
                                    }));
                                    $('#inputLinkAutor').val(element.id);
                                    
                                };
                            }
                            else if (element.status === 'error_autorExists') {
                                alert("ERROR: Ya existe el autor");
                            }
                            
                        },
                        error: function (element) {
                            console.log(element);
                        },
                        type : 'post',
                        dataType : 'json'
            };
            $("#inputDataAutor").ajaxForm(options);
    
    });