<?php
    require_once "../menu/top_menu_item.php";
    require_once "modals/modal.php";
    require_once "modals/reimprimir_boleta/modalAñoBoleta.php";
    require_once "modals/reimprimir_boleta/modalMesBoleta.php";
    require_once "modals/reimprimir_boleta/modalDiaBoleta.php";
    require_once "modals/reimprimir_boleta/modalCorrelativo.php";
    require_once "modals/producto/buscar_producto.php";
    require_once "modals/metodo_pago/metodo_pago_cuentas.php";

    echo modalSolicitarAutorizacion();
    echo modalAnular();
    echo modalCambiarCantidad();
    echo modalCambiarCantidadPesaje();
    echo modalMetodoPago();
    echo modalAñadirCuenta();
    echo modalAgregarCliente();
    echo modalPagarCuenta();
    echo modalSeleccionarCuenta();
    echo modalDescuento();
    echo modalResumenCaja();
    echo modalConsultarPrecio();
    echo modalCajaInicial();
    echo modalMovimientoCaja();
    echo modalResumenCierreCaja();
?>