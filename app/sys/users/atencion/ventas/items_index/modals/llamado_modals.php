<?php
    require_once "../menu/top_menu_item.php";
    //Anular venta
    require_once "modals/anular_venta/anular_venta.php";

    //Caja
    require_once "modals/caja/caja_inicial.php";
    require_once "modals/caja/movimiento_caja.php";

    //Cantidad productos
    require_once "modals/cantidad/cambiar_cantidad_pesaje.php";
    require_once "modals/cantidad/cambiar_cantidad.php";

    //Cliente
    require_once "modals/cliente/agregar_cliente.php";

    //Cuentas
    require_once "modals/cuentas/cuentas.php";
    require_once "modals/cuentas/pagar_cuenta.php";
    require_once "modals/cuentas/seleccionar_cuenta.php";

    //Descuento
    require_once "modals/descuento/descuento.php";

    //Método de pago
    require_once "modals/metodo_pago/metodo_pago_cuentas.php";
    require_once "modals/metodo_pago/metodo_pago.php";

    //Precio
    require_once "modals/precio/consulta_precio.php";

    //Producto
    require_once "modals/producto/buscar_producto.php";
    
    //Reimprimir boleta
    require_once "modals/reimprimir_boleta/modalAñoBoleta.php";
    require_once "modals/reimprimir_boleta/modalMesBoleta.php";
    require_once "modals/reimprimir_boleta/modalDiaBoleta.php";
    require_once "modals/reimprimir_boleta/modalCorrelativo.php";

    //Resúmen de caja
    require_once "modals/resumen_caja/resumen_caja.php";
    require_once "modals/resumen_caja/resumen_cierre_caja.php";

    //Solicitar autorización
    require_once "modals/solicitar_autorizacion/solicitar_autorizacion.php";

?>