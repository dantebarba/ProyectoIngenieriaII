window.callerID = null;
function callModal(modalID, callerID) { // GET THE CALLER MODAL ID
           $(callerID).modal("hide");
           window.callerID = callerID;
           $(modalID).modal('show');
       } 
       

function rollbackModal() {
    if (window.callerID !== null) {
        $(window.callerID).modal("show");
        window.callerID = null;
    }
    
}
       
       
 