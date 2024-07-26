cargarCorrelativo();
    function cargarCorrelativo()
    {
        debugger;
        //obtener ID de venta
        let numero_caja = $("#nCaja").text();
        let id = parseInt(cargarIDVentaCaja(numero_caja));


        $("#id_venta").html(id);
        cargarVentasCaja();
    }