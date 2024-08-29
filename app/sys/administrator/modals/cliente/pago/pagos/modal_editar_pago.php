



<?php

function modalEditarPagos()
{
    return "<div class='modal fade' id='modalEditarPagos' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-scrollable  modal-lg' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h5 class='modal-title' id='exampleModalLongTitle'><strong>Editando pago</strong> <strong id='idPagoEditar'></strong><strong id='idClienteEditar' style='display: none'></strong></h5>
            </div>
            <div class='modal-body'>
                <table width='100%'>
                    <tr>
                        <td width='16%'><label>Método de pago:</label></td>
                        <td width='16%'><select id='slctMetodoPagoEditar'  class='form-control'></select></td>
                        <td width='16%'><label>Periodo de pago:</label></td>
                        <td width='16%'><select id='slctPeriodoPagoEditar'  class='form-control' onchange='calcularPrecioNuevoPagoEditar()'></select></td>
                        <td width='16%'><label>Plan contratado:</label></td>
                        <td width='16%'><select id='slctPlanContratadoEditar'  class='form-control' onchange='calcularPrecioNuevoPagoEditar()'></select></td>
                    </tr>
                </table>
            </div>
            <hr>
            <div class='modal-body'>
                <table width='100%'>
                    <tr>
                        <td width='16%'><label>Valor plan: </label></td>
                        <td width='16%'><label id='lblValorPlanEditar'>Cargando...</label></td>
                        <td width='16%'><label>Meses seleccionados:</label></td>
                        <td width='16%'><label id='lblMesSeleccionadoEditar'>Cargando...</label></td>
                        <td width='16%'><label>Precio total:</label></td>
                        <td width='16%'><label id='lblPrecioTotalEditar'>Cargando...</label></td>
                    </tr>
                </table>
            </div>
            <div class='modal-footer'>
                <button id='btnEditarPago' class='btn btn-success' style='margin: 2px'>Editar pago</button>
            </div>
        </div>
    </div>
  </div>";
}

?>