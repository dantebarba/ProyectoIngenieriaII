// requirees NOTY


function notyInlineNotification(modal, type, text, callback) {
    return $(modal).noty({   layout: 'inline',
                    text: text,
                    timeout: '3000',
                    type: type,
                    callback: {
                        onClose: callback
                    }
                });
};

function notyClear() {
    noty.closeAll();
}

function notyTopNotification(type, text, callback) {
    return noty({   layout: 'topCenter',
                    text: text,
                    timeout: '3000',
                    type: type,
                    callback: {
                        onClose: callback
                    }
                });
};


