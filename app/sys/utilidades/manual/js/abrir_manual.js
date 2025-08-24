$(document).ready(function() {
    $(document).on('keydown', function(e) {
        // Detecta Ctrl + G
        if (e.ctrlKey && e.key === 'm') {
            abrir_manual()
            e.preventDefault(); // Evita el comportamiento predeterminado del navegador
        }
    });
});


function abrir_manual()
{
    $("#modalManual").modal("show");
}


var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
triggerTabList.forEach(function (triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)
    
    triggerEl.addEventListener('click', function (event) {
        event.preventDefault()
        tabTrigger.show()
    })
})