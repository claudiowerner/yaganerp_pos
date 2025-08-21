

$(document).ready(function(e)
{
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    $("#slctGiros").select2({
        dropdownParent: $('#modalRegistro')
    });

})
