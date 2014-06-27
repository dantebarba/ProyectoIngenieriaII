function callModal(modalID) {
           var id = $(".modal").attr('id'); // GET THE CALLER MODAL ID
           $(".modal").modal("hide");
           $(".modal-body #fromModal").val(id);
           $(modalID).modal('show');
       } 
       

function rollbackModal(modalID) {
    if ($(modalID).val() !== "0") {
        $(modalID).val("0");
        $(modalID).modal("show");
    }
    
}
       
       
 