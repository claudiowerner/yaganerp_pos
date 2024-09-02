



<?php

function modalRegistroPagos()
{
    return "<div class='modal fade' id='modalRegistroPagos' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-scrollable  modal-lg' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h5 class='modal-title' id='exampleModalLongTitle'><label>Registro de pagos </label><strong id='idClientePago'></strong></h5>
            </div>
            <div class='modal-body'>
                <table width='100%'>
                    <tr>
                        <td width='14%'><label>Método de pago:</label></td>
                        <td width='14%'><select id='slctMetodoPago'  class='form-control'></select></td>
                        <td width='14%'><label>Periodo de pago:</label></td>
                        <td width='14%'><select id='slctPeriodoPago'  class='form-control' onchange='calcularPrecioNuevoPago()'></select></td>
                        <td width='14%'><label>Plan contratado:</label></td>
                        <td width='14%'><select id='slctPlanContratado'  class='form-control' onchange='calcularPrecioNuevoPago()'></select></td>
                        <td width='14%'><button id='btnRegistrarPago' class='btn btn-success' style='margin: 2px'>Registrar nuevo periodo</button></td>
                    </tr>
                </table>
            </div>
            <hr>
            <div class='modal-body'>
                <table width='100%'>
                    <tr>
                        <td width='16%'><label>Valor plan: </label></td>
                        <td width='16%'><label id='lblValorPlan'>Cargando...</label></td>
                        <td width='16%'><label>Meses seleccionados:</label></td>
                        <td width='16%'><label id='lblMesSeleccionado'>Cargando...</label></td>
                        <td width='16%'><label>Precio total:</label></td>
                        <td width='16%'><label id='lblPrecioTotal'>Cargando...</label></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>";
}

?>